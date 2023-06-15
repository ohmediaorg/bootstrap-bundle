<?php

namespace OHMedia\BootstrapBundle\Component\Breadcrumbs;

class BreadcrumbNode
{
    private Breadcrumb $breadcrumb;
    private array $nodes = [];

    public function __construct(Breadcrumb $breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;
    }

    public function getBreadcrumb(): Breadcrumb
    {
        return $this->breadcrumb;
    }

    public function addNode(BreadcrumbNode $node): self
    {
        $this->nodes[] = $node;

        return $this;
    }

    public function getNodes(): array
    {
        return $this->nodes;
    }
}
