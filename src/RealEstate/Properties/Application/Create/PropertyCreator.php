<?php

declare(strict_types=1);

use Qm\Shared\Domain\Bus\Event\EventBus;
use Repository\PropertyRepository;

final readonly class PropertyCreator
{
    public function __construct(
        private PropertyRepository $repository,
        private EventBus $bus,
    ) {
    }

    public function create(CreatePropertyCommand $command): void
    {
        $property = Property::fromPrimitives(
            $command->id,
            $command->address,
            $command->postalCode,
            $command->price,
        );

        $this->repository->save($property);
        $this->bus->publish(...$property->pullDomainEvents());
    }
}
