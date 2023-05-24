<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria\Order;

use Qm\Shared\Domain\ValueObject\StringVO;

class OrderBy extends StringVO
{
    public static function of(string $value): self
    {
        return new self($value);
    }
}
