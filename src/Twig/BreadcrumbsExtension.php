<?php

namespace OHMedia\BootstrapBundle\Twig;

use OHMedia\BootstrapBundle\Component\Breadcrumb;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbsExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_breadcrumb', [$this, 'breadcrumb']),
            new TwigFunction('bootstrap_breadcrumbs', [$this, 'breadcrumbs'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    public function breadcrumb(string $text, string $route = '', array $routeParams = []): Breadcrumb
    {
        return new Breadcrumb($text, $route, $routeParams);
    }

    public function breadcrumbs(Environment $twig, Breadcrumb ...$breadcrumbs)
    {
        return $twig->render('@OHMediaBootstrap/breadcrumbs.html.twig', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
