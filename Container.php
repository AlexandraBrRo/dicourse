<?php

namespace DiStudy;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;


class Container implements \Psr\Container\ContainerInterface
{
    /**
     * @inheritdoc
     */
    private $entry = [];

    public function set($name, callable $class)
    {
       $this->entry[$name] = $class;
    }

    public function get(string $id)
    {
        if(!esset($this->entry[$id])){
            throw new \Exception('Dependency not found: ' . $id);
        }
        $resolver = $this->entry[$id];
        return $resolver($this);
    }
    /**
     * @inheritdoc
     */
    public function has(string $id): bool
    {
        return isset($this->entry[$id]);
    }
}