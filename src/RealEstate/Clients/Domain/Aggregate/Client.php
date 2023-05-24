<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Aggregate;

use Qm\RealEstate\Clients\Domain\Event\ClientCreatedEvent;
use Qm\Shared\Domain\Aggregate\AggregateRoot;

class Client extends AggregateRoot
{
    private function __construct(
        private ClientId        $id,
        private ClientFirstName $clientFirstName,
        private ClientLastName  $clientLastName,
    ) {
    }

    public static function create(ClientId $id, ClientFirstName $firstName, ClientLastName  $lastName,): self
    {
        $client = new self($id, $firstName, $lastName);

        $client->record(
            new ClientCreatedEvent(
                $id->value(),
                $firstName->value(),
                $lastName->value()
            )
        );

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
