<?php

namespace OHMedia\BootstrapBundle\Twig;

use OHMedia\BootstrapBundle\Component\Nav\Nav;
use OHMedia\BootstrapBundle\Component\Nav\NavDropdown;
use OHMedia\BootstrapBundle\Component\Nav\NavDropdownDivider;
use OHMedia\BootstrapBundle\Component\Nav\NavDropdownItemInterface;
use OHMedia\BootstrapBundle\Component\Nav\NavItemInterface;
use OHMedia\BootstrapBundle\Component\Nav\NavLink;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class NavExtension extends AbstractExtension
{
    public function __construct(
        private RequestStack $requestStack,
        private UrlGeneratorInterface $urlGenerator
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_nav', [$this, 'nav'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
            new TwigFunction('is_bootstrap_nav_item_active', [$this, 'isActive']),
            new TwigFunction('is_bootstrap_nav_dropdown', [$this, 'isDropdown']),
            new TwigFunction('is_bootstrap_nav_dropdown_divider', [$this, 'isDivider']),
        ];
    }

    public function nav(Environment $twig, Nav $nav, string $className = 'nav')
    {
        return $twig->render('@OHMediaBootstrap/nav.html.twig', [
            'nav' => $nav,
            'class_name' => $className,
        ]);
    }

    public function isActive(mixed $item): bool
    {
        if ($item instanceof NavDropdown) {
            foreach ($item->getItems() as $child) {
                if ($this->isActive($child)) {
                    return true;
                }
            }
        } elseif ($item instanceof NavLink) {
            $request = $this->requestStack->getCurrentRequest();

            $currentRoute = $request->get('_route', '');
            $currentRouteParams = $request->get('_route_params', []);

            $path = $this->urlGenerator->generate($item->getRoute(), $item->getRouteParams());

            $currentPath = $currentRoute
                ? $this->urlGenerator->generate($currentRoute, $currentRouteParams)
                : '';

            return $path === $currentPath;
        }

        return false;
    }

    public function isDropdown(NavItemInterface $item)
    {
        return $item instanceof NavDropdown;
    }

    public function isDivider(NavDropdownItemInterface $item)
    {
        return $item instanceof NavDropdownDivider;
    }
}
