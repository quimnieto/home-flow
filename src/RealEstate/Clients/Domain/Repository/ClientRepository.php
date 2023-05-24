<?php

namespace Qm\RealEstate\Clients\Domain\Repository;

use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Aggregate\Clients;
use Qm\Shared\Domain\Criteria\Criteria;

interface ClientRepository
{
    public function save(Client $client): void;

    public function searchAll(): clients;

    public function searchByCriteria(Criteria $criteria): Clients;
}
