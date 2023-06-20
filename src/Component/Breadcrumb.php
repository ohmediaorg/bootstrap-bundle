<?php

namespace OHMedia\BootstrapBundle\Component;

class Breadcrumb
{
    private $href;
    private $text;

    public function __construct(string $text, string $href)
    {
        $this->text = $text;
        $this->href = $href;
    }

    public function getHref(): ?string
    {
        return $this->href;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
