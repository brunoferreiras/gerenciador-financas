<?php
declare(strict_types=1);

namespace Fin;


use Fin\Plugins\PluginInterface;

class Application
{
    private $serviceContainer;

    /**
     * Application constructor.
     * @param $serviceContainer
     */
    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function service($name)
    {
        return $this->serviceContainer->get($name);
    }

    public function addService(string $name, $service): void
    {
        if (is_callable($service)) {
            $this->serviceContainer->addLazy($name, $service);
        } else {
            $this->serviceContainer->add($name);
        }
    }

    public function plugin(PluginInterface $plugin): void
    {
        $plugin->register($plugin);
    }
}
