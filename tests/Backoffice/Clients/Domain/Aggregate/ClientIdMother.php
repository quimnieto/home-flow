<?php

declare(strict_types=1);

namespace Tests\Backoffice\Clients\Domain\Aggregate;

use Qm\Backoffice\Clients\Domain\Aggregate\ClientId;
use Qm\Shared\Domain\ValueObject\Uuid;

class ClientIdMother
{
    public static function of(?string $id): ClientId
    {
        return ClientId::of($id ?? Uuid::random());
    }
}
