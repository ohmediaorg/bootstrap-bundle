<?php

namespace OHMedia\BootstrapBundle\Component;

class Breadcrumb
{
    public function __construct(
        private string $text,
        private string $route = '',
        private array $routeParams = []
    ) {
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
