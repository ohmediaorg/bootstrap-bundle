<?php

namespace OHMedia\BootstrapBundle\Twig\Extension;

use OHMedia\BootstrapBundle\Component\Breadcrumbs\BreadcrumbTrail;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbsExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_breadcrumbs', [$this, 'breadcrumbs'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    public function breadcrumbs(Environment $twig, ?BreadcrumbTrail $breadcrumbTrail)
    {
        if (!$breadcrumbTrail) {
            return '';
        }

        return $twig->render('@OHMediaBootstrap/breadcrumbs.html.twig', [
            'breadcrumb_trail' => $breadcrumbTrail,
        ]);
    }
}
