<?php

namespace OHMedia\BootstrapBundle\Component\Accordion;

class Accordion
{
    private bool $alwaysOpen = false;
    private bool $firstOpen = false;
    private bool $flush = false;
    private array $items = [];

    public function isAlwaysOpen(): bool
    {
        return $this->alwaysOpen;
    }

    public function setAlwaysOpen(bool $alwaysOpen): self
    {
        $this->alwaysOpen = $alwaysOpen;

        return $this;
    }

    public function isFirstOpen(): bool
    {
        return $this->firstOpen;
    }

    public function setFirstOpen(bool $firstOpen): self
    {
        $this->firstOpen = $firstOpen;

        return $this;
    }

    public function isFlush(): bool
    {
        return $this->flush;
    }

    public function setFlush(bool $flush): self
    {
        $this->flush = $flush;

        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(AccordionItemInterface ...$items): self
    {
        $this->items = $items;

        return $this;
    }

    public function addItem(AccordionItemInterface $item)
    {
        $this->items[] = $item;

        return $this;
    }
}
