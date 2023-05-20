<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Create;

use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Repository\ClientRepository;
use Qm\Shared\Domain\Bus\Event\EventBus;

final readonly class ClientCreator
{
    public function __construct(
        private ClientRepository $repository,
        private EventBus $bus,
    ) {
    }

    public function create(CreateClientCommand $command): void
    {
        $client = Client::fromPrimitives(
            $command->id,
            $command->firstName,
            $command->lastName
        );

        $this->repository->save($client);
        $this->bus->publish(...$client->pullDomainEvents());
    }
}
