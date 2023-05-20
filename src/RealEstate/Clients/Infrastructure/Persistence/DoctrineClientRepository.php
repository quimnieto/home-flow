<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Infrastructure\Persistence;

use Doctrine\ORM\Exception\NotSupported;
use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Repository\ClientRepository;
use Qm\Shared\Infrastructure\Doctrine\DoctrineRepository;

class DoctrineClientRepository extends DoctrineRepository implements ClientRepository
{
    public function save(Client $client): void
    {
        $this->persist($client);
    }

    /**
     * @return Client[]
     * @throws NotSupported
     */
    public function searchAll(): array
    {
        return $this->repository(Client::class)->findAll();
    }
}
