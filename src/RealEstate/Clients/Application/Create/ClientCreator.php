<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Create;

use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Aggregate\ClientFirstName;
use Qm\RealEstate\Clients\Domain\Aggregate\ClientId;
use Qm\RealEstate\Clients\Domain\Aggregate\ClientLastName;
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
        $client = Client::create(
            ClientId::of($command->id),
            ClientFirstName::of($command->firstName),
            ClientLastName::of($command->lastName)
        );

        $this->repository->save($client);
        $this->bus->publish(...$client->pullDomainEvents());
    }
}
