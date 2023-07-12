<?php

namespace OHMedia\BootstrapBundle\Twig\Extension;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FlashExtension extends AbstractExtension
{
    public const FLASH_MAP = [
        'primary',
        'secondary',
        'success',
        'notice' => 'success',
        'danger',
        'error' => 'danger',
        'warning',
        'info',
        'light',
        'dark',
    ];

    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_alerts', [$this, 'alerts'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
            new TwigFunction('bootstrap_toasts', [$this, 'toasts'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    public function alerts(Environment $twig)
    {
        return $twig->render('@OHMediaBootstrap/alerts.html.twig', [
            'flash_map' => self::FLASH_MAP,
        ]);
    }

    public function toasts(Environment $twig)
    {
        return $twig->render('@OHMediaBootstrap/toasts.html.twig', [
            'flash_map' => self::FLASH_MAP,
        ]);
    }
}
