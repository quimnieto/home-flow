<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Search;

use Qm\Shared\Domain\Bus\Query\QueryHandler;
use Qm\Shared\Domain\Bus\Query\Response;

class SearchClientQueryHandler implements QueryHandler
{
    public function __construct(private ClientsSearcher $clientSearcher)
    {
    }

    public function __invoke(SearchClientQuery $query): Response
    {
        return $this->clientSearcher->search();
    }
}
