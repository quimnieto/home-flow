<?php

declare(strict_types=1);

namespace Qm\RealEstate\Clients\Application\Create;

use Qm\Shared\Domain\Bus\Command\CommandHandler;

class CreateClientCommandHandler implements CommandHandler
{
    public function __construct(private ClientCreator $clientCreator)
    {
    }

    public function __invoke(CreateClientCommand $command): void
    {
        $this->clientCreator->create($command);
    }
}
