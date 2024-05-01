<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

class NavDropdown implements NavItemInterface
{
    private array $items = [];
    private string $icon = '';

    public function __construct(private string $text)
    {
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

    public function getText(): string
    {
        return $this->text;
    }

    public function addLink(NavLink $link): self
    {
        $this->items[] = $link;

        return $this;
    }

    public function addDivider(): self
    {
        $this->items[] = new NavDropdownDivider();

        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
