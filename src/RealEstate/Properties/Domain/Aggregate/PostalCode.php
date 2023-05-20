<?php

declare(strict_types=1);

use Qm\Shared\Domain\ValueObject\IntVO;

class PostalCode extends intVO
{
    public static function of(int $postalCode): self
    {
        // todo Validations
        return new self($postalCode);
    }
}
