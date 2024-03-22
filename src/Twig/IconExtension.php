<?php

namespace OHMedia\BootstrapBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class IconExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_icon', [$this, 'icon'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function icon(string $icon)
    {
        return "<i class=\"bi bi-$icon\"></i>";
    }
}
