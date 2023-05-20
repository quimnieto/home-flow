<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Infrastructure\Persistence\Doctrine;

use Qm\RealEstate\Clients\Domain\Aggregate\ClientId;
use Qm\RealEstate\Shared\Infrastructure\Doctrine\UuIdType;

class ClientIdType extends UuIdType
{
    protected function typeClassName(): string
    {
        return ClientId::class;
    }
}
