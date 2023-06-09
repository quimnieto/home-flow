<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\ValueObject;

abstract class IntVO
{
    public function __construct(protected int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }
}
