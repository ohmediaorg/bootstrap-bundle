<?php

namespace OHMedia\BootstrapBundle\Twig\Extension;

use OHMedia\BootstrapBundle\Component\Accordion\Accordion;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AccordionExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_accordion', [$this, 'accordion'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    public function accordion(Environment $twig, Accordion $accordion)
    {
        return $twig->render('@OHMediaBootstrap/accordion.html.twig', [
            'accordion' => $accordion,
        ]);
    }
}
