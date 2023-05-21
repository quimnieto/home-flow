<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Domain\Aggregate;

use Qm\Shared\Domain\ValueObject\IntVO;

class Price extends intVO
{
    public static function of(int $price): self
    {
        // todo Validations
        return new self($price);
    }
}
