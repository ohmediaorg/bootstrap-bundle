<?php

namespace OHMedia\BootstrapBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BadgeExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_badge_primary', [$this, 'badgePrimary'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('bootstrap_badge_secondary', [$this, 'badgeSecondary'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('bootstrap_badge_success', [$this, 'badgeSuccess'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('bootstrap_badge_danger', [$this, 'badgeDanger'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('bootstrap_badge_warning', [$this, 'badgeWarning'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('bootstrap_badge_info', [$this, 'badgeInfo'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('bootstrap_badge_light', [$this, 'badgeLight'], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction('bootstrap_badge_dark', [$this, 'badgeDark'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function badgePrimary(string $message): string
    {
        return $this->badge($message, 'primary');
    }

    public function badgeSecondary(string $message): string
    {
        return $this->badge($message, 'secondary');
    }

    public function badgeSuccess(string $message): string
    {
        return $this->badge($message, 'success');
    }

    public function badgeDanger(string $message): string
    {
        return $this->badge($message, 'danger');
    }

    public function badgeWarning(string $message): string
    {
        return $this->badge($message, 'warning');
    }

    public function badgeInfo(string $message): string
    {
        return $this->badge($message, 'info');
    }

    public function badgeLight(string $message): string
    {
        return $this->badge($message, 'light');
    }

    public function badgeDark(string $message): string
    {
        return $this->badge($message, 'dark');
    }

    private function badge(string $message, string $themeColor): string
    {
        return '<span class="badge text-bg-'.$themeColor.'">'.$message.'</span>';
    }
}
