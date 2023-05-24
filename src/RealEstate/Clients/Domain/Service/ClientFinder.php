<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Service;

use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Aggregate\ClientId;
use Qm\RealEstate\Clients\Domain\Exception\ClientDoesNotExistException;
use Qm\RealEstate\Clients\Domain\Repository\ClientRepository;
use Qm\Shared\Domain\Criteria\Criteria;
use Qm\Shared\Domain\Criteria\Filter\FilterOperator;
use Qm\Shared\Domain\Criteria\Filter\Filters;
use Qm\Shared\Domain\Criteria\Order\Order;

class ClientFinder
{
    public function __construct(private ClientRepository $repository)
    {
    }

    public function byId(ClientId $id): Client
    {
        $filters = $this->createFilters($id);
        $order = Order::none();
        $offset = 0;
        $limit = 1;

        $criteria = Criteria::create($filters, $order, $offset, $limit);

        $client = $this->repository->searchByCriteria($criteria)->items();

        if (empty($client)) {
            ClientDoesNotExistException::create($id->value());
        }

        return reset($client);
    }

    private function createFilters(ClientId $id): Filters
    {
        $filter = [
            'field' => 'id',
            'operator' => FilterOperator::EQUAL,
            'value' => $id->value()
        ];

        return Filters::fromValues([$filter]);
    }
}
