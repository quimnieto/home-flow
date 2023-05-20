<?php

declare(strict_types=1);

namespace Qm\Apps\RealEstate\Backend\Controller\Clients;

use Qm\RealEstate\Clients\Application\Create\CreateClientCommand;
use Qm\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

readonly final class ClientsPutController
{
    public function __construct(private CommandBus $bus)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);

        $command = new CreateClientCommand(
            $id,
            $parameters['firstName'],
            $parameters['lastName'],
        );

        $this->bus->dispatch($command);

       return new JsonResponse([], Response::HTTP_CREATED);
    }
}
