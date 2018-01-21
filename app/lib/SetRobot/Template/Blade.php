<?php

namespace SetRobot\Template;

use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Contracts\View\Factory as FactoryContract;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineInterface;
use Illuminate\View\ViewFinderInterface;

class Blade
{

    protected $app;

    public function __construct(FactoryContract $env, ContainerContract $app)
    {
        $this->env = $env;
        $this->app = $app;
    }

    public function compiler()
    {
        static $engineResolver;
        if (!$engineResolver) {
            $engineResolver = $this->app->make('view.engine.resolver');
        }
        return $engineResolver->resolve('blade')->getCompiler();
    }

    public function render($view, $data = [], $mergeData = [])
    {
        $filesystem = $this->app['files'];
        return $this->{$filesystem->exists($view) ? 'file' : 'make'}($view, $data, $mergeData)->render();
    }

    public function compiledPath($file, $data = [], $mergeData = [])
    {
        $rendered = $this->file($file, $data, $mergeData);
        $engine = $rendered->getEngine();

        if (!($engine instanceof CompilerEngine)) {
            return $file;
        }

        $compiler = $engine->getCompiler();
        $compiledPath = $compiler->getCompiledPath($rendered->getPath());
        if ($compiler->isExpired($compiledPath)) {
            $compiler->compile($file);
        }
        return $compiledPath;
    }

    public function normalizeViewPath($file)
    {
        $view = str_replace('\\', '/', $file);
        $view = $this->applyNamespaceToPath($view);

        $view = str_replace(array_merge($this->app['config']['view.paths'], ['.blade.php', '.php']), '', $view);

        return ltrim(preg_replace('%//+%', '/', $view), '/');
    }

    public function applyNamespaceToPath($path)
    {
        /** @var ViewFinderInterface $finder */
        $finder = $this->app['view.finder'];
        if (!method_exists($finder, 'getHints')) {
            return $path;
        }
        $delimiter = $finder::HINT_PATH_DELIMITER;
        $hints = $finder->getHints();
        $view = array_reduce(array_keys($hints), function ($view, $namespace) use ($delimiter, $hints) {
            return str_replace($hints[$namespace], $namespace.$delimiter, $view);
        }, $path);
        return preg_replace("%{$delimiter}[\\/]*%", $delimiter, $view);
    }

    public function __call($method, $params)
    {
        return call_user_func_array([$this->env, $method], $params);
    }
}
