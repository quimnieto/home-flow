<?php

declare(strict_types=1);

namespace Qm\Apps\RealEstate\Backend\Controller\Properties;

use Qm\RealEstate\Properties\Application\Create\CreatePropertyCommand;
use Qm\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

readonly final class PropertiesPutController
{
    public function __construct(private CommandBus $bus)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);

        $command = new CreatePropertyCommand(
            $id,
            $parameters['address'],
            (int) $parameters['postalCode'],
            (int) $parameters['price'],
        );

        $this->bus->dispatch($command);

       return new JsonResponse([], Response::HTTP_CREATED);
    }
}
