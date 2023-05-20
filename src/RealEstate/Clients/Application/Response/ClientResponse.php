<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Response;

use Qm\Shared\Domain\Bus\Query\Response;

final readonly class ClientResponse implements Response
{
    public function __construct(
        public string $id,
        public string $firstName,
        public string $lastName
    ) {
    }
}
