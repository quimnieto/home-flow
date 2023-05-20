<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\ValueObject;

abstract class StringVO
{
    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}
