<?php

namespace OHMedia\BootstrapBundle\Service;

use Doctrine\ORM\QueryBuilder;
use OHMedia\BootstrapBundle\Component\Pagination;
use Symfony\Component\HttpFoundation\RequestStack;

class Paginator
{
    public function __construct(private RequestStack $requestStack)
    {
    }

    public function paginate(
        QueryBuilder $queryBuilder,
        int $limit,
        bool $fetchJoinCollection = true
    ): Pagination {
        try {
            $page = $this->requestStack
                ->getCurrentRequest()
                ->query->get('p', 1);
        } catch (\Exception $e) {
            $page = 1;
        }

        return new Pagination(
            $queryBuilder,
            $limit,
            intval($page),
            $fetchJoinCollection
        );
    }
}
