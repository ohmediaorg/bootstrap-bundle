<?php

namespace OHMedia\BootstrapBundle\Service;

use Doctrine\ORM\QueryBuilder;
use OHMedia\BootstrapBundle\Component\Pagination;
use Symfony\Component\HttpFoundation\RequestStack;

class Paginator
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function paginate(
        QueryBuilder $queryBuilder,
        int $limit,
        bool $fetchJoinCollection = true
    ): Pagination
    {
        $page = $this->requestStack
            ->getCurrentRequest()
            ->query->get('p', 1);

        return new Pagination(
            $queryBuilder,
            $limit,
            intval($page),
            $fetchJoinCollection
        );
    }
}
