<?php

declare(strict_types=1);

namespace Qm\Shared\Infrastructure\Doctrine\Dbal;

use Doctrine\DBAL\Types\Type;
use function Lambdish\Phunctional\each;

final class DbalCustomTypesRegistrar
{
    private static bool $initialized = false;

    public static function register(DoctrineCustomType ...$customTypes): void
    {
        if (!self::$initialized) {
            each(self::registerType(), $customTypes);

            self::$initialized = true;
        }
    }

    private static function registerType(): callable
    {
        return static function (DoctrineCustomType $customType): void {
            Type::addType($customType::customTypeName(), get_class($customType));
        };
    }
}
