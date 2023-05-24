<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria\Filter;

enum FilterOperator: string
{
    case EQUAL = '=';
    case NOT_EQUAL = '!=';
    case GT_OR_EQUAL = '>=';
    case GT = '>';
    case LT = '<';
    case LT_OR_EQUAL = '<=';
    case LIKE = 'LIKE';
    case NOT_LIKE = 'NOT LIKE';
    case IN = 'IN';
    case NOT_IN = 'NOT_IN';
    case IS_NULL = 'IS_NULL';
    case IS_NOT_NULL = 'IS_NOT_NULL';

    public static function of(string $value): self
    {
        return self::from($value);
    }
}
