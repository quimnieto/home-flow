<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria\Order;

enum OrderType: string
{
    case ASC = 'asc';
    case DESC = 'desc';
    case NONE = 'none';

    public static function of(string $value): self
    {
       return self::from($value);
    }

    public function isNone(): bool
    {
        return $this->value === self::NONE->value;
    }
}
