<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria\Filter;

use Qm\Shared\Domain\ValueObject\StringVO;

class FilterField extends StringVO
{
    public static function of(string $value): self
    {
        return new self($value);
    }
}
