<?php

namespace OHMedia\BootstrapBundle\Component\Breadcrumbs;

class Breadcrumb
{
    private $controller;
    private $href;
    private $route;
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getController(): ?string
    {
        return $this->controller;
    }

    public function setController(string $controller): self
    {
        $this->controller = $controller;

        return $this;
    }

    public function getHref(): ?string
    {
        return $this->href;
    }

    public function setHref(string $href): self
    {
        $this->href = $href;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
