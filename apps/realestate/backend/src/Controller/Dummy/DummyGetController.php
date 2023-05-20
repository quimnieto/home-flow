<?php

declare(strict_types=1);

namespace Qm\Apps\RealEstate\Backend\Controller\Dummy;

use Qm\RealEstate\Dummy\Application\Dummy;
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
                'Dummy RealEstate API!',
                $this->dummy->execute(),
            ]
        );
    }
}
