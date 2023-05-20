<?php

declare(strict_types=1);

namespace Qm\Mortgage\Dummy\Application;

use Symfony\Component\HttpKernel\Kernel;

class Dummy
{
    public function execute(): array
    {
        return [
            'PHP' => PHP_VERSION,
            'Symfony' => Kernel::VERSION,
        ];
    }
}
