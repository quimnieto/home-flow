<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Search;

use Qm\RealEstate\Clients\Application\Response\ClientResponse;
use Qm\RealEstate\Clients\Application\Response\ClientsListResponse;
use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Repository\ClientRepository;

class ClientsSearcher
{
    public function __construct(private readonly ClientRepository $repository)
    {
    }

    public function search(): ClientsListResponse
    {
        $clientsList = $this->repository->searchAll();

        return new ClientsListResponse(
            ...array_map(
                fn (Client $client) => new ClientResponse(
                $client->id()->value(),
                $client->clientFirstName()->value(),
                $client->clientLastName()->value(),
            ),
                $clientsList
            )
        );
    }
}
