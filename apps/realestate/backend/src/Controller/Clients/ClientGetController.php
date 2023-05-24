<?php

declare(strict_types=1);

namespace Qm\Apps\RealEstate\Backend\Controller\Clients;

use Qm\RealEstate\Clients\Application\Find\FindClientQuery;
use Qm\RealEstate\Clients\Application\Response\ClientResponse;
use Qm\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class ClientGetController
{
    public function __construct(private QueryBus $bus)
    {
    }

    public function __invoke(string $id): JsonResponse
    {
        /** @var clientResponse $response */
        $response = $this->bus->ask(new FindClientQuery($id));

        return new JsonResponse(
            [
                'id' => $response->id,
                'firstName' => $response->firstName,
                'lastName' => $response->lastName,
            ],
            Response::HTTP_OK
        );
    }
}
