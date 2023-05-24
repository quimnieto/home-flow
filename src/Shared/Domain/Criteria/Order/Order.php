<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria\Order;

final class Order
{
    public function __construct(private OrderBy $orderBy, private OrderType $orderType)
    {
    }

    public static function fromValues(string $orderBy, string $orderType): self
    {
        return new self(
            OrderBy::of($orderBy),
            OrderType::of($orderType)
        );
    }

    public static function none(): Order
    {
        return new Order(new OrderBy(''), OrderType::NONE);
    }

    public function orderBy(): OrderBy
    {
        return $this->orderBy;
    }

    public function orderType(): OrderType
    {
        return $this->orderType;
    }

    public function isNone(): bool
    {
        return $this->orderType()->isNone();
    }
}
