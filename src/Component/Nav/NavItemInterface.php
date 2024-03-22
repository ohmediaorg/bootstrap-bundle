<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

interface NavItemInterface
{
    public function getText(): string;

    public function getIcon(): string;

    public function isActive(string $currentPath): bool;
}
