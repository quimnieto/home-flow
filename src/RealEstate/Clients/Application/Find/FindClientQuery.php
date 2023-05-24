<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Find;

use Qm\Shared\Domain\Bus\Query\Query;

readonly class FindClientQuery implements Query
{
    public function __construct(public string $id)
    {
    }
}
