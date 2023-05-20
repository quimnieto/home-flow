<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Create;


use Qm\RealEstate\Clients\Domain\Event\ClientCreatedEvent;
use Qm\Shared\Domain\Bus\Event\DomainEventSubscriber;

class TestSubscriberClientCreated implements DomainEventSubscriber
{
    public static function subscribedTo(): array
    {
        return [ClientCreatedEvent::class];
    }

    public function __invoke()
    {
        print_r('ENTRA');
    }
}
