<?php

declare(strict_types=1);

namespace Qm\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManager;
use Qm\Shared\Domain\Utils;
use function Lambdish\Phunctional\each;

final class DatabaseConnections
{
    private readonly array $connections;

    public function __construct(iterable $connections)
    {
        $this->connections = Utils::iterableToArray($connections);
    }

    public function clear(): void
    {
        each(fn (EntityManager $entityManager) => $entityManager->clear(), $this->connections);
    }
}
