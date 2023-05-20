<?php

declare(strict_types=1);

namespace Qm\Apps\Mortgage\Backend\Controller\Dummy;

use Qm\Mortgage\Dummy\Application\Dummy;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

Readonly class DummyGetController
{
    public function __construct(private Dummy $dummy)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(
            [
                'Dummy Mortgage API!',
                $this->dummy->execute(),
            ]
        );
    }
}
