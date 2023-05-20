<?php

declare(strict_types=1);

use Qm\Shared\Infrastructure\Doctrine\DoctrineRepository;
use Repository\PropertyRepository;

class DoctrinePropertyRepository extends DoctrineRepository implements PropertyRepository
{
    public function save(Property $property): void
    {
        $this->persist($property);
    }
}
