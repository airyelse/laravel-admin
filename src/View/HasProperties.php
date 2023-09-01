<?php

namespace Encore\Admin\View;

use Illuminate\Support\Collection;

trait HasProperties
{
    protected array $properties = [];

    public function getProperties(): Collection
    {
        return collect($this->properties);
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    public function hasProperty($name): bool
    {
        return isset($this->getProperties()[$name]);
    }

    public function getProperty(string $name, mixed $default = null)
    {
        if (!$this->hasProperty($name)) {
            return $default;
        } else {
            return $this->getProperties()[$name];
        }
    }

    public function setProperty(string $name, mixed $value): void
    {
        $this->properties[$name] = $value;
    }

    public function __set(string $name, $value): void
    {
        $this->setProperty($name, $value);
    }

    public function __get(string $name): mixed
    {
        return $this->getProperty($name);
    }

}