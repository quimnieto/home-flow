<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Domain\Aggregate;

use Qm\Shared\Domain\ValueObject\StringVO;

class Address extends StringVO
{
    public static function of(string $lastName): self
    {
        return new self($lastName);
    }
}
