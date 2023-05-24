<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Domain\Aggregate;

use Qm\Shared\Domain\Collection;

class Clients extends Collection
{
    protected function type(): string
    {
        return Client::class;
    }
}
