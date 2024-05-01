<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

class NavLink implements NavItemInterface, NavDropdownItemInterface
{
    private bool $disabled = false;
    private string $icon = '';

    public function __construct(
        private string $text,
        private string $route,
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
