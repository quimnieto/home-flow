<?php

declare(strict_types=1);

namespace Doctrine;

use PropertyId;
use Qm\RealEstate\Shared\Infrastructure\Doctrine\UuIdType;

class PropertyIdType extends UuIdType
{
    protected function typeClassName(): string
    {
        return PropertyId::class;
    }
}
