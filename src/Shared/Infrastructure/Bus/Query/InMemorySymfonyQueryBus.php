<?php

declare(strict_types=1);

namespace Qm\Shared\Infrastructure\Bus\Query;

use Qm\Shared\Domain\Bus\Query\Query;
use Qm\Shared\Domain\Bus\Query\QueryBus;
use Qm\Shared\Domain\Bus\Query\Response;
use Qm\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class InMemorySymfonyQueryBus implements QueryBus
{
    private MessageBus $bus;

    public function __construct(iterable $queryHandlers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(
                        CallableFirstParameterExtractor::forCallables($queryHandlers)
                    )
                )
            ]
        );
    }

    public function ask(Query $query): ?Response
    {
        $result = null;

        try {
            $result = $this->bus->dispatch($query)->last(HandledStamp::class);
        } catch (NoHandlerForMessageException) {
        }

        return $result?->getResult();
    }
}
