<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Infrastructure\Persistence;

use Qm\RealEstate\Properties\Domain\Aggregate\Property;
use Qm\RealEstate\Properties\Domain\Repository\PropertyRepository;
use Qm\Shared\Infrastructure\Doctrine\DoctrineRepository;

class DoctrinePropertyRepository extends DoctrineRepository implements PropertyRepository
{
    public function save(Property $property): void
    {
        $this->persist($property);
    }
}
