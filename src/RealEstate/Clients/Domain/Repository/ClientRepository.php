<?php

namespace Qm\RealEstate\Clients\Domain\Repository;

use Qm\RealEstate\Clients\Domain\Aggregate\Client;

interface ClientRepository
{
    public function save(Client $client): void;

    /**
     * @return Client[]
     */
    public function searchAll(): array;
}
