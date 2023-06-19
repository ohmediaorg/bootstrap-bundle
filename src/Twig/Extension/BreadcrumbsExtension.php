<?php

namespace OHMedia\BootstrapBundle\Twig\Extension;

use OHMedia\BootstrapBundle\Component\Breadcrumb;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbsExtension extends AbstractExtension
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

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

    public function breadcrumb(string $text, string $route, array $parameters = []): Breadcrumb
    {
        $href = $this->urlGenerator->generate($route, $parameters);

        return new Breadcrumb($text, $href);
    }

    public function breadcrumbs(Environment $twig, Breadcrumb ...$breadcrumbs)
    {
        return $twig->render('@OHMediaBootstrap/breadcrumbs.html.twig', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
