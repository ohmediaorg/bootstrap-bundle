<?php

namespace OHMedia\BootstrapBundle\Component;

class Breadcrumb
{
    private $text;
    private $route;
    private $routeParams;

    public function __construct(string $text, string $route = '', array $routeParams = [])
    {
        $this->text = $text;
        $this->route = $route;
        $this->routeParams = $routeParams;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getRouteParams(): array
    {
        return $this->routeParams;
    }
}
