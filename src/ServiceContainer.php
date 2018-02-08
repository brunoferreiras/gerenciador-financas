<?php

namespace Fin;


use Xtreamwayz\Pimple\Container;

class ServiceContainer implements ServiceContainerInterface
{
    private $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function add(string $name, $service)
    {
        $this->container[$name] = $service;
    }

    public function addLazy(string $name, callable $callable)
    {
        $this->container[$name] = $this->container->factory($callable);
    }

    public function get(string $name)
    {
        $this->container->get($name);
    }

    public function has(string $name)
    {
        $this->container->has($name);
    }
}