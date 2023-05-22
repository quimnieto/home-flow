<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Application\Create;

use Qm\RealEstate\Properties\Domain\Aggregate\Address;
use Qm\RealEstate\Properties\Domain\Aggregate\PostalCode;
use Qm\RealEstate\Properties\Domain\Aggregate\Price;
use Qm\RealEstate\Properties\Domain\Aggregate\Property;
use Qm\RealEstate\Properties\Domain\Aggregate\PropertyId;
use Qm\Shared\Domain\Bus\Event\EventBus;
use Qm\RealEstate\Properties\Domain\Repository\PropertyRepository;

final readonly class PropertyCreator
{
    public function __construct(
        private PropertyRepository $repository,
        private EventBus $bus,
    ) {
    }

    public function create(CreatePropertyCommand $command): void
    {
        $property = Property::create(
            PropertyId::of($command->id),
            Address::of($command->address),
            PostalCode::of($command->postalCode),
            Price::of($command->price),
        );

        $this->repository->save($property);
        $this->bus->publish(...$property->pullDomainEvents());
    }
}
