<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Event;

use Qm\Shared\Domain\Bus\Event\DomainEvent;

class ClientCreatedEvent extends DomainEvent
{
    const EVENT_NAME = 'client.created';

    public function __construct(
        public readonly string $id,
        public readonly string $firstName,
        public readonly string $lastName,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['first_name'],
            $body['last_name'],
            $eventId,
            $occurredOn
        );
    }

    public static function eventName(): string
    {
        return self::EVENT_NAME;
    }

    public function toPrimitives(): array
    {
        return [
            $this->id,
            $this->firstName,
            $this->lastName,
        ];
    }
}
