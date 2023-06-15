<?php

namespace OHMedia\BootstrapBundle\Component\Accordion;

interface AccordionItemInterface
{
    public function getBody(): string;
    public function getHeader(): string;
}
