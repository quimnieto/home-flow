<?php

declare(strict_types=1);

class InvalidPropertyPriceException extends DomainException
{
    public static function create(int $price): void
    {
        throw new self('Invalid property price ' . $price);
    }
}
