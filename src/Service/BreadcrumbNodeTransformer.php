<?php

namespace OHMedia\BootstrapBundle\Service;

use OHMedia\BootstrapBundle\Component\Breadcrumbs\BreadcrumbNode;
use OHMedia\BootstrapBundle\Component\Breadcrumbs\BreadcrumbTrail;
use Symfony\Component\HttpFoundation\RequestStack;

class BreadcrumbNodeTransformer
{
    private array $trails;
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function nodeToTrail(BreadcrumbNode $node): ?BreadcrumbTrail
    {
        $this->trails = [];

        $this->buildTrails($node);

        $currentRequest = $this->requestStack->getCurrentRequest();

        $currentPath = $currentRequest->getPathInfo();
        $currentRoute = $currentRequest->get('_route');
        $currentController = $currentRequest->get('_controller');

        foreach ($this->trails as $trail) {
            if (
                ($currentPath && $trail->isHref($currentPath)) ||
                ($currentRoute && $trail->isRoute($currentRoute)) ||
                ($currentController && $trail->isController($currentController))
            ) {
                return $trail;
            }
        }

        return null;
    }

    private function buildTrails(BreadcrumbNode $node, ?BreadcrumbTrail $trail = null): void
    {
        if (!$trail) {
            $trail = new BreadcrumbTrail();
        }

        $this->trails[] = $trail;

        $trail->addBreadcrumb($node->getBreadcrumb());

        foreach ($node->getNodes() as $childNode) {
            $clone = clone $trail;

            $this->buildTrails($childNode, $clone);
        }
    }
}
