<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Domain\Aggregate;

use Event\PropertyCreatedEvent;
use Qm\Shared\Domain\Aggregate\AggregateRoot;

class Property extends AggregateRoot
{
    public function __construct(
      public PropertyId $id,
      public Address $address,
      public PostalCode $postalCode,
      public Price $price,
    ) {
    }

    public static function create(
        PropertyId $id,
        Address $address,
        PostalCode $postalCode,
        Price $price,
    ): self {
        $property = new self($id, $address, $postalCode, $price);

        $property->record(
            new PropertyCreatedEvent(
                $id->value(),
                $address->value(),
                $postalCode->value(),
                $price->value()
            )
        );

        return $property;
    }
}
