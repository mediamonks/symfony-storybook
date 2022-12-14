<?php

declare(strict_types=1);

namespace MediaMonks\Muban\Component;

class Components
{
    private array $components = [];

    public function __construct(iterable $components = [])
    {
        foreach ($components as $component) {
            $this->components[$component->getComponent()] = $component;
        }
    }

    public function addComponent(ComponentInterface $component): void {
        $this->components[$component->getComponent()] = $component;
    }

    public function get(string $name): ?ComponentInterface
    {
        return $this->components[$name] ?? null;
    }

    private function list(): array
    {
        $components = [];

        /** @var ComponentInterface $component */
        foreach ($this->components as $component) {
            $components[] = $component->getComponent();
        }

        return $components;
    }
}