<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Domain\Aggregate;

use InvalidPropertyPriceException;

class Price
{
    private const MINIMUM_PROPERTY_PRICE_ALLOWED = 2000000;

    public function __construct(private readonly int $value)
    {
        $this->assertPriceIsGraterThanMinimumAllowed($value);
    }

    public static function of(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    private function assertPriceIsGraterThanMinimumAllowed(int $value): void
    {
        if ($value < self::MINIMUM_PROPERTY_PRICE_ALLOWED) {
            InvalidPropertyPriceException::create($value);
        }
    }
}
