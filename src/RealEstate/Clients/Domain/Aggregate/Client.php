<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Aggregate;

use Qm\RealEstate\Clients\Domain\Event\ClientCreatedEvent;
use Qm\Shared\Domain\Aggregate\AggregateRoot;

class Client extends AggregateRoot
{
    public function __construct(
        private ClientId        $id,
        private ClientFirstName $clientFirstName,
        private ClientLastName  $clientLastName,
    ) {
    }

    public static function fromPrimitives(
        string $id,
        string $firstName,
        string $lastName,
    ): self {
        $client = new self(
            ClientId::of($id),
            ClientFirstName::of($firstName),
            ClientLastName::of($lastName)
        );

        $client->record(new ClientCreatedEvent($id, $firstName, $lastName));

        return $client;
    }

    public function id(): ClientId
    {
        return $this->id;
    }

    public function clientFirstName(): ClientFirstName
    {
        return $this->clientFirstName;
    }

    public function clientLastName(): ClientLastName
    {
        return $this->clientLastName;
    }
}
