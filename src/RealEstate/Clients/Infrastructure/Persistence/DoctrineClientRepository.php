<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Infrastructure\Persistence;

use Qm\RealEstate\Clients\Domain\Aggregate\Client;
use Qm\RealEstate\Clients\Domain\Aggregate\Clients;
use Qm\RealEstate\Clients\Domain\Repository\ClientRepository;
use Qm\Shared\Domain\Criteria\Criteria;
use Qm\Shared\Infrastructure\Doctrine\DoctrineCriteriaConverter;
use Qm\Shared\Infrastructure\Doctrine\DoctrineRepository;

class DoctrineClientRepository extends DoctrineRepository implements ClientRepository
{
    private static array $criteriaToDoctrineFields = [
        'id' => 'id',
        'firstName' => 'first_name',
        'lastName' => 'last_name',
    ];

    public function save(Client $client): void
    {
        $this->persist($client);
    }

    public function searchAll(): clients
    {
        return new Clients($this->repository(Client::class)->findAll());
    }

    public function searchByCriteria(Criteria $criteria): Clients
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $clients = $this->repository(Client::class)->matching($doctrineCriteria)->toArray();

        return new Clients($clients);
    }
}
