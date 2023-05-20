<?php

declare(strict_types=1);

use Qm\Shared\Domain\ValueObject\Uuid;

class PropertyId extends Uuid
{
    public static function of(string $id): self
    {
        return new self($id);
    }
}
