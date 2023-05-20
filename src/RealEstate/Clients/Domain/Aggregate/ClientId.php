<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Aggregate;

use Qm\Shared\Domain\ValueObject\Uuid;

class ClientId extends Uuid
{
    public static function of(string $id): self
    {
        return new self($id);
    }
}
