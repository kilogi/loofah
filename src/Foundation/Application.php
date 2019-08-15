<?php

namespace Src\Foundation;

use App\Providers\RouteServiceProvider;
use Src\Container\Container;
use Src\Foundation\Bootstrap\RegisterFacades;

class Application extends Container
{

    /**
     * 判断application是否已经启动
     * @var bool
     */
    protected $booted = false;

    /**
     * The array of booting callbacks.
     *
     * @var array
     */
    protected $bootingCallbacks = [];

    /**
     * The array of booted callbacks.
     *
     * @var array
     */
    protected $bootedCallbacks = [];

    /**
     * 所有注册的服务提供者
     * @var array
     */
    protected $serviceProviders = [];

    /**
     * 标记已加载服务提供者名称，键为类名，值为bool
     * @var array
     */
    protected $loadedProviders = [];

    /**
     * 判断是否已经启动过一些引导类
     * @var bool
     */
    protected $hasBeenBootstrapped = false;

    /**
     * 初始化
     * Application constructor.
     */
    public function __construct()
    {
        //注册基本的绑定
        $this->registerBaseBindings();

        //注册基本的服务提供者
        $this->registerBaseServiceProviders();
    }

    /**
     * 基础绑定
     */
    protected function registerBaseBindings()
    {
        $this->instance('app', $this);
    }

    /**
     * 基础服务提供者
     */
    protected function registerBaseServiceProviders()
    {
        $this->register(new RouteServiceProvider($this));
    }

    /**
     * 启动一些 bootstrap 类
     * @param array $bootstrappers
     */
    public function bootstrapWith(array $bootstrappers)
    {
        $this->hasBeenBootstrapped = true;

        foreach ($bootstrappers as $bootstrapper) {
            $boot = new $bootstrapper;
            $boot->bootstrap($this);
        }

    }

    /**
     * 注册 $provider 配置的模块到框架。实例化对应的 ServiceProvider 类，并运行 register 和 boot 方法
     *
     */
    public function register($provider, $options = [], $force = false)
    {
        //如果 $provider 是字符串，根据字符串实例化对应的 ServiceProvider 对象
        if (is_string($provider)) {
            $provider = $this->resolveProvider($provider);
        }

        //调用 $provider 的 register 方法
        if (method_exists($provider, 'register')) {
            $provider->register();
        };

        //标识 $provider 已经注册过
        $this->markAsRegistered($provider);

        //如果 Application 已经启动，启动这个 $provider
        if ($this->booted) {
            $this->bootProvider($provider);
        }

        return $provider;
    }

    /**
     * 从类名解析一个服务提供者的实例
     */
    public function resolveProvider($provider)
    {
        return new $provider($this);
    }

    /**
     * 标记这个服务提供者已经注册
     */
    protected function markAsRegistered($provider)
    {
        $this->serviceProviders[] = $provider;

        $this->loadedProviders[get_class($provider)] = true;
    }

    /**
     * 启动这个 application 的 ServiceProvider
     */
    public function boot()
    {
        if ($this->booted) {
            return;
        }

        //触发启动 Application 前的回调
        $this->fireAppCallbacks($this->bootingCallbacks);

        //array_walk函数对数组中的每个元素应用用户自定义函数。在自定义函数中，第一个参数是值,第二个参数是键。
        array_walk($this->serviceProviders, function ($p) {
            $this->bootProvider($p);
        });

        $this->booted = true;
        //触发启动 Application 后的回调
        $this->fireAppCallbacks($this->bootedCallbacks);
    }

    /**
     * 启动App回调函数
     * @param array $callbacks
     */
    protected function fireAppCallbacks(array $callbacks)
    {
        foreach ($callbacks as $callback) {
            call_user_func($callback, $this);
        }
    }

    /**
     * 启动 ServiceProvider。运行 ServiceProvider 对象的 boot 方法
     * @param $provider
     * @return mixed
     */
    protected function bootProvider($provider)
    {
        if (method_exists($provider, 'boot')) {
            return $this->call([$provider, 'boot']);
        }
    }

    /**
     * 是否已经启动过引导类
     * @return bool
     */
    public function hasBeenBootstrapped()
    {
        return $this->hasBeenBootstrapped;
    }
}