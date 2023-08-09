<?php

namespace OHMedia\BootstrapBundle\Component\Accordion;

class AccordionItem implements AccordionItemInterface
{
    private $body;
    private $header;

    public function __construct(string $header, string $body)
    {
        $this->body = $body;
        $this->header = $header;
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
