<?php

declare(strict_types=1);

namespace Event;

use Qm\Shared\Domain\Bus\Event\DomainEvent;

class PropertyCreatedEvent extends DomainEvent
{
    const EVENT_NAME = 'property.created';

    public function __construct(
        public readonly string $id,
        public readonly string $address,
        public readonly int $postalCode,
        public readonly int $price,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['address'],
            $body['postalCode'],
            $body['price'],
            $eventId,
            $occurredOn,
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
            $this->address,
            $this->postalCode,
            $this->price,
        ];
    }
}
