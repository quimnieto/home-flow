<?php

declare(strict_types=1);

use Qm\Shared\Domain\Bus\Command\Command;

readonly class CreatePropertyCommand implements Command
{
    public function __construct(
        public string $id,
        public string $address,
        public int $postalCode,
        public int $price,
    ) {
    }
}
