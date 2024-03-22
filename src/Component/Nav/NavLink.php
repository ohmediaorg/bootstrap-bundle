<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

class NavLink implements NavItemInterface, NavDropdownItemInterface
{
    private bool $disabled = false;
    private string $text = '';
    private string $icon = '';
    private string $route = '';
    private array $route_params = [];

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
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

    public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function setRouteParams(array $route_params): self
    {
        $this->route_params = $route_params;

        return $this;
    }

    public function getRouteParams(): array
    {
        return $this->route_params;
    }

    public function isActive(string $currentPath): bool
    {
        return $currentPath === $this->href;
    }
}
