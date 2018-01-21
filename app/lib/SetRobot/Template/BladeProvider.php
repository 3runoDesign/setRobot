<?php

namespace SetRobot\Template;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\ViewServiceProvider;

class BladeProvider extends ViewServiceProvider
{

    public function __construct(ContainerContract $container = null, $config = [])
    {
        parent::__construct($container ?: Container::getInstance());

        $this->app->bindIf('config', function () use ($config) {
            return $config;
        }, true);
    }

    public function register()
    {
        $this->registerFilesystem();
        $this->registerEvents();
        $this->registerEngineResolver();
        $this->registerViewFinder();
        $this->registerFactory();
        return $this;
    }

    public function registerFilesystem()
    {
        $this->app->bindIf('files', Filesystem::class, true);
        return $this;
    }

    public function registerEvents()
    {
        $this->app->bindIf('events', Dispatcher::class, true);
        return $this;
    }

    public function registerEngineResolver()
    {
        parent::registerEngineResolver();
        return $this;
    }

    public function registerFactory()
    {
        parent::registerFactory();
        return $this;
    }

    public function registerViewFinder()
    {
        $this->app->bindIf('view.finder', function ($app) {
            $config = $this->app['config'];
            $paths = $config['view.paths'];
            $namespaces = $config['view.namespaces'];
            $finder = new FileViewFinder($app['files'], $paths);
            array_map([$finder, 'addNamespace'], array_keys($namespaces), $namespaces);
            return $finder;
        }, true);
        return $this;
    }
}
