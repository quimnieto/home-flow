<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Create;

use Qm\Shared\Domain\Bus\Command\Command;

Readonly final class CreateClientCommand implements Command
{
    public function __construct(public string $id, public string $firstName, public string $lastName)
    {
    }
}
