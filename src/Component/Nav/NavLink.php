<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

class NavLink implements NavItemInterface, NavDropdownItemInterface
{
    private bool $disabled = false;
    private string $href = '';
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
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

    public function setHref(string $href): self
    {
        $this->href = $href;

        return $this;
    }

    public function getHref(): string
    {
        return $this->href;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function isActive(string $currentPath): bool
    {
        return $currentPath === $this->href;
    }
}
