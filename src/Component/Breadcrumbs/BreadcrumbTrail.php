<?php

namespace OHMedia\BootstrapBundle\Component\Breadcrumbs;

class BreadcrumbTrail
{
    private array $breadcrumbs;

    public function __construct(Breadcrumb ...$breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    public function addBreadcrumb(Breadcrumb $breadcrumb): self
    {
        $this->breadcrumbs[] = $breadcrumb;

        return $this;
    }

    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    public function isController(string $controller): bool
    {
        $end = $this->getEnd();

        return $end && $end->getController() === $controller;
    }

    public function isHref(string $currentHref): bool
    {
        $end = $this->getEnd();

        return $end && $end->getHref() === $currentHref;
    }

    public function isRoute(string $route): bool
    {
        $end = $this->getEnd();

        return $end && $end->getRoute() === $route;
    }

    private function getEnd()
    {
        $end = end($this->breadcrumbs);

        reset($this->breadcrumbs);

        return $end;
    }
}
