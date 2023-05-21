<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Infrastructure\Persistence\Doctrine;

use Qm\RealEstate\Properties\Domain\Aggregate\PropertyId;
use Qm\RealEstate\Shared\Infrastructure\Doctrine\UuIdType;

class PropertyIdType extends UuIdType
{
    protected function typeClassName(): string
    {
        return PropertyId::class;
    }
}
