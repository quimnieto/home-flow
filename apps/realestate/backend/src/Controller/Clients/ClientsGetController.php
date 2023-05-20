<?php

declare(strict_types=1);

namespace Qm\Apps\RealEstate\Backend\Controller\Clients;

use Qm\RealEstate\Clients\Application\Response\ClientResponse;
use Qm\RealEstate\Clients\Application\Search\SearchClientQuery;
use Qm\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

readonly class ClientsGetController
{
    public function __construct(private QueryBus $bus)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $response = $this->bus->ask(new SearchClientQuery());

        return new JsonResponse(
            array_map(
                fn (ClientResponse $clientResponse) => [
                'id' => $clientResponse->id,
                'firstName' => $clientResponse->firstName,
                'lastName' => $clientResponse->lastName,
            ],
                $response->clients
            ),
            Response::HTTP_OK
        );
    }
}
