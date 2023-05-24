<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria\Filter;

final class Filter
{
    public function __construct(
        private FilterField $field,
        private FilterOperator $operator,
        private FilterValue $value
    ) {
    }

    public static function fromValues(array $values): self
    {
        return new self(
            FilterField::of($values['field']),
            FilterOperator::of($values['operator']),
            FilterValue::of($values['value'])
        );
    }

    public function field(): FilterField
    {
        return $this->field;
    }

    public function operator(): FilterOperator
    {
        return $this->operator;
    }

    public function value(): FilterValue
    {
        return $this->value;
    }
}
