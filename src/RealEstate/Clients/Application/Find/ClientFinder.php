<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Find;

use Qm\RealEstate\Clients\Application\Response\ClientResponse;
use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Aggregate\ClientId;
use Qm\RealEstate\Clients\Domain\Exception\ClientDoesNotExistException;
use Qm\RealEstate\Clients\Domain\Repository\ClientRepository;
use Qm\Shared\Domain\Criteria\Criteria;
use Qm\Shared\Domain\Criteria\Filter\FilterOperator;
use Qm\Shared\Domain\Criteria\Filter\Filters;
use Qm\Shared\Domain\Criteria\Order\Order;

final class ClientFinder
{
    public function __construct(private ClientRepository $repository)
    {
    }

    public function find(FindClientQuery $query): clientResponse
    {
        $id = ClientId::of($query->id);

        $criteria = Criteria::create(
            $this->createFilters($id),
            Order::none(),
            0,
            1
        );

        $clients = $this->repository->searchByCriteria($criteria)->items();

        if (empty($clients)) {
            ClientDoesNotExistException::create($id->value());
        }

        /** @var Client $client */
        $client = reset($clients);

        return new ClientResponse(
            $client->id()->value(),
            $client->clientFirstName()->value(),
            $client->clientLastName()->value(),
        );

    }

    private function createFilters(ClientId $id): Filters
    {
        $filter = [
            'field' => 'id',
            'operator' => FilterOperator::EQUAL->value,
            'value' => $id->value()
        ];

        return Filters::fromValues([$filter]);
    }
}
