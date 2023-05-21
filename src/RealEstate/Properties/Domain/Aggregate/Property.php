<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Domain\Aggregate;

use Event\PropertyCreatedEvent;
use Qm\Shared\Domain\Aggregate\AggregateRoot;

class Property extends AggregateRoot
{
    public function __construct(
      public readonly PropertyId $id,
      public readonly Address $address,
      public readonly PostalCode $postalCode,
      public readonly Price $price,
    ) {
    }

    public static function fromPrimitives(
        string $id,
        string $address,
        int $postalCode,
        int $price,
    ): self {
        $property = new self(
            PropertyId::of($id),
            Address::of($address),
            PostalCode::of($postalCode),
            Price::of($price)
        );

        $property->record(new PropertyCreatedEvent($id, $address, $postalCode, $price));

        return $property;
    }
}
