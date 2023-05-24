<?php

declare(strict_types=1);

namespace Qm\Shared\Domain\Criteria;

class SearchByCriteriaRequest
{
    public function __construct(public Criteria $criteria)
    {
    }
}
