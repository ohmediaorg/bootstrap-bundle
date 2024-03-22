<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

class NavLink implements NavItemInterface, NavDropdownItemInterface
{
    private string $text = '';
    private string $route = '';
    private array $routeParams = [];
    private bool $disabled = false;
    private string $icon = '';

    public function __construct(string $text, string $route, array $routeParams = [])
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
        return $this->route_params;
    }

    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }
}
