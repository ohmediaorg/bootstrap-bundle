<?php

namespace OHMedia\BootstrapBundle\Twig;

use OHMedia\BootstrapBundle\Component\Pagination;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PaginationExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('bootstrap_pagination', [$this, 'pagination'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
            new TwigFunction('bootstrap_pagination_info', [$this, 'paginationInfo']),
        ];
    }

    public function pagination(Environment $twig, Pagination $pagination, array $options = [])
    {
        if (!$pagination->getPages()) {
            return '';
        }

        $options = array_merge([
            'aria_label' => '',
            'size' => 'md',
        ], $options);

        return $twig->render('@OHMediaBootstrap/pagination.html.twig', [
            'pagination' => $pagination,
            'options' => $options,
        ]);
    }

    public function paginationInfo(Pagination $pagination)
    {
        $offset = $pagination->getOffset();
        $limit = $pagination->getLimit();
        $count = $pagination->getCount();

        $lastItem = min($offset + $limit, $count);

        return $count ? sprintf('%s-%s of %s', $offset + 1, $lastItem, $count) : '';
    }
}
