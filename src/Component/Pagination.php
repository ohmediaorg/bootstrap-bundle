<?php

namespace OHMedia\BootstrapBundle\Component;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

class Pagination
{
    private int $count;
    private int $limit;
    private ?int $next;
    private int $offset;
    private int $page;
    private int $pages;
    private Paginator $paginator;
    private ?int $previous;

    public function __construct(
        QueryBuilder $queryBuilder,
        int $limit,
        int $page,
        bool $fetchJoinCollection = true
    ) {
        $this->page = max(1, $page);

        $this->limit = max(1, $limit);

        $this->offset = $this->limit * ($this->page - 1);

        $queryBuilder
            ->setFirstResult($this->offset)
            ->setMaxResults($this->limit)
        ;

        $this->paginator = new Paginator($queryBuilder, $fetchJoinCollection);

        $this->count = count($this->paginator);

        $this->pages = ceil($this->count / $this->limit);

        $this->previous = $this->page > 1
            ? $this->page - 1
            : null;

        $this->next = $this->count > ($this->offset + $this->limit)
            ? $this->page + 1
            : null;
    }

    public function getResults(): Paginator
    {
        return $this->paginator;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getPrevious(): ?int
    {
        return $this->previous;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function getNext(): ?int
    {
        return $this->next;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function isActive(int $page): bool
    {
        return $page === $this->page;
    }
}
