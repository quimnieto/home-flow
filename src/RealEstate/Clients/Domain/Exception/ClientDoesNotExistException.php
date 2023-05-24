<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Exception;

use DomainException;

class ClientDoesNotExistException extends DomainException
{
    public static function create(string $id): void
    {
        throw new self('Client with id ' . $id . ' not found');
    }
}
