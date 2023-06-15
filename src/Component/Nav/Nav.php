<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

class Nav
{
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(NavItemInterface $item): self
    {
        $this->items[] = $item;

        return $this;
    }
}
