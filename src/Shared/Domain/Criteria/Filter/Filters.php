<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria\Filter;

use Qm\Shared\Domain\Collection;

final class Filters extends collection
{
    public static function fromValues(array $values): self
    {
        $filterBuilder = fn (array $values) => Filter::fromValues($values);

        return new self(
            array_map($filterBuilder, $values)
        );
    }

    public static function none(): self
    {
        return new self([]);
    }

    public function add(Filter $filter): self
    {
        return new self(array_merge($this->items(), [$filter]));
    }

    public function filters(): array
    {
        return $this->items();
    }

    protected function type(): string
    {
       return Filter::class;
    }
}
