<?php

declare(strict_types=1);

namespace Tests\Backoffice\Clients\Domain\Aggregate;

use Qm\Backoffice\Clients\Domain\Aggregate\Client;
use Qm\Backoffice\Clients\Domain\Aggregate\ClientFirstName;
use Qm\Backoffice\Clients\Domain\Aggregate\ClientLastName;

class ClientMother
{
    public static function create(
        ?string $id,
        string $firstName,
        string $lastName
    ): Client {
        return new Client(
            ClientIdMother::of($id),
            ClientFirstName::of($firstName),
            ClientLastName::of($lastName),
        );
    }
}
