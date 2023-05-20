<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Aggregate;

use Qm\Shared\Domain\ValueObject\StringVO;

class ClientLastName extends StringVO
{
    public static function of(string $lastName): self
    {
        return new self($lastName);
    }
}
