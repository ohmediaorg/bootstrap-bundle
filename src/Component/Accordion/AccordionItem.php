<?php

namespace OHMedia\BootstrapBundle\Component\Accordion;

class AccordionItem implements AccordionItemInterface
{
    public function __construct(private string $header, private string $body)
    {
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getHeader(): string
    {
        return $this->header;
    }
}
