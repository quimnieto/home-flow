<?php

namespace Repository;

use Property;

interface PropertyRepository
{
    public function save(Property $property): void;
}
