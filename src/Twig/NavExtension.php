<?php

namespace OHMedia\BootstrapBundle\Twig;

use OHMedia\BootstrapBundle\Component\Nav\Nav;
use OHMedia\BootstrapBundle\Component\Nav\NavDropdown;
use OHMedia\BootstrapBundle\Component\Nav\NavDropdownDivider;
use OHMedia\BootstrapBundle\Component\Nav\NavDropdownItemInterface;
use OHMedia\BootstrapBundle\Component\Nav\NavItemInterface;
use Symfony\Component\Security\Http\Logout\LogoutUrlGenerator;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class NavExtension extends AbstractExtension
{
    private $logoutUrlGenerator;

    public function __construct(LogoutUrlGenerator $logoutUrlGenerator)
    {
        $this->logoutUrlGenerator = $logoutUrlGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_navbar', [$this, 'navbar'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
            new TwigFunction('bootstrap_nav', [$this, 'nav'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
            new TwigFunction('is_bootstrap_nav_dropdown', [$this, 'isDropdown']),
            new TwigFunction('is_bootstrap_nav_dropdown_divider', [$this, 'isDivider']),
        ];
    }

    public function navbar(
        Environment $twig,
        Nav $nav,
        string $className = 'navbar navbar-expand-lg bg-light',
        bool $showLogout = false
    ) {
        $logoutPath = null;

        if ($showLogout) {
            try {
                $logoutPath = $this->logoutUrlGenerator->getLogoutPath();
            } catch (\Exception $e) {
                $logoutPath = null;
            }
        }

        return $twig->render('@OHMediaBootstrap/navbar.html.twig', [
            'nav' => $nav,
            'class_name' => $className,
            'logout_path' => $logoutPath,
        ]);
    }

    public function nav(Environment $twig, Nav $nav, string $className = 'nav')
    {
        return $twig->render('@OHMediaBootstrap/nav.html.twig', [
            'nav' => $nav,
            'class_name' => $className,
        ]);
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
