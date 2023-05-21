<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Aggregate;

use Qm\RealEstate\Clients\Domain\Event\ClientCreatedEvent;
use Qm\Shared\Domain\Aggregate\AggregateRoot;

class Client extends AggregateRoot
{
    public function __construct(
        public readonly ClientId        $id,
        public readonly ClientFirstName $clientFirstName,
        public readonly ClientLastName  $clientLastName,
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
}
