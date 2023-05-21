<?php

namespace Qm\RealEstate\Properties\Domain\Repository;

use Qm\RealEstate\Properties\Domain\Aggregate\Property;

interface PropertyRepository
{
    public function save(Property $property): void;
}
