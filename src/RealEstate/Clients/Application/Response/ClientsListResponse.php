<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Response;

 use Qm\Shared\Domain\Bus\Query\Response;

 final readonly class ClientsListResponse implements Response
{
    public array $clients;

    public function __construct(ClientResponse ...$clients)
    {
        $this->clients = $clients;
    }
}
