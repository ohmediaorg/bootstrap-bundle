<?php

namespace OHMedia\BootstrapBundle\Component\Nav;

interface NavItemInterface
{
    public function getText(): string;

    public function getIcon(): string;
}
