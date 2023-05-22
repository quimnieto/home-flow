<?php

declare(strict_types=1);

namespace Qm\Mortgage\Leads\Application\Create;

use Qm\RealEstate\Clients\Domain\Event\ClientCreatedEvent;
use Qm\Shared\Domain\Bus\Event\DomainEventSubscriber;

class CreateLeadOnRealEstateClientCreated implements DomainEventSubscriber
{
    public function __construct()
    {
    }

    public static function subscribedTo(): array
    {
        return [ClientCreatedEvent::class];
    }

    public function __invoke(ClientCreatedEvent $event)
    {
       print_r('HI FROM MORTGAGE SUBSCRIBER!');
       print_r(PHP_EOL);
       print_r($event->firstName);
    }
}
