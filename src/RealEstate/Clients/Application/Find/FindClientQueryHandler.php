<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Find;

use Qm\RealEstate\Clients\Application\Response\ClientResponse;
use Qm\Shared\Domain\Bus\Query\QueryHandler;

class FindClientQueryHandler implements QueryHandler
{
    public function __construct(private ClientFinder $clientFinder)
    {
    }

    public function __invoke(FindClientQuery $query): ClientResponse
    {
        return $this->clientFinder->find($query);
    }
}
