<?php

declare(strict_types=1);

use Qm\Shared\Domain\Bus\Command\CommandHandler;

class CreatePropertyCommandHandler implements CommandHandler
{
    public function __construct(private PropertyCreator $propertyCreator)
    {
    }

    public function __invoke(CreatePropertyCommand $command)
    {
        $this->propertyCreator->create($command);
    }
}
