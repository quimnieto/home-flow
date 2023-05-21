<?php

declare(strict_types=1);

namespace Qm\RealEstate\Properties\Domain\Aggregate;

use Event\PropertyCreatedEvent;
use Qm\Shared\Domain\Aggregate\AggregateRoot;

class Property extends AggregateRoot
{
    public function __construct(
      private PropertyId $id,
      private Address $address,
      private PostalCode $postalCode,
      private Price $price,
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

    public function id(): PropertyId
    {
        return $this->id;
    }

    public function address(): Address
    {
        return $this->address;
    }

    public function postalCode(): PostalCode
    {
        return $this->postalCode;
    }

    public function price(): Price
    {
        return $this->price;
    }
}
