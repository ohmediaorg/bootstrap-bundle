<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

class NavDropdown implements NavItemInterface
{
    private array $items = [];
    private string $icon = '';
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
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

    public function isActive(string $currentPath): bool
    {
        foreach ($this->items as $item) {
            if ($item instanceof NavLink && $item->isActive($currentPath)) {
                return true;
            }
        }

        return false;
    }
}
