<?php

declare(strict_types=1);

namespace Qm\Shared\Domain;

use ArrayIterator;
use Countable;
use IteratorAggregate;

abstract class Collection implements Countable, IteratorAggregate
{
    public function __construct(protected array $items)
    {
        Assert::arrayOf($this->type(), $items);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items());
    }

    public function count(): int
    {
        return count($this->items());
    }

    public function items(): array
    {
        return $this->items;
    }

    abstract protected function type(): string;
}
