<?php

declare(strict_types=1);

use Qm\Shared\Domain\ValueObject\StringVO;

class Address extends StringVO
{
    public static function of(string $lastName): self
    {
        return new self($lastName);
    }
}
