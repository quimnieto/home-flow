<?php

declare(strict_types=1);

namespace Qm\Shared\Infrastructure\Doctrine;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\Exception\ORMException;
use Qm\Shared\Infrastructure\Doctrine\Dbal\DbalCustomTypesRegistrar;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\MySQLSchemaManager;
use Doctrine\ORM\Configuration;
use Doctrine\DBAL\Platforms\MariaDBPlatform;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\ORM\ORMSetup;
use Qm\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use RuntimeException;
use function Lambdish\Phunctional\dissoc;

final class DoctrineEntityManagerFactory
{
    private static array $sharedPrefixes = [
        __DIR__ . '/../../../Shared/Infrastructure/Doctrine' => 'Qm\Shared\Domain\Aggregate',
    ];

    /**
     * @param array $parameters
     * @param array $contextPrefixes
     * @param bool $isDevMode
     * @param string $schemaFile
     * @param DoctrineCustomType[] $dbalCustomTypesClasses
     * @return EntityManager
     * @throws Exception
     * @throws ORMException
     */
    public static function create(
        array  $parameters,
        array  $contextPrefixes,
        bool   $isDevMode,
        string $schemaFile,
        array $dbalCustomTypesClasses
    ): EntityManager {

        if ($isDevMode) {
            DoctrineEntityManagerFactory::generateDatabaseIfNotExists($parameters, $schemaFile);
        }

        DbalCustomTypesRegistrar::register(...$dbalCustomTypesClasses);

        return EntityManager::create($parameters, self::createConfiguration($contextPrefixes, $isDevMode));
    }

    /**
     * @throws Exception
     */
    private static function generateDatabaseIfNotExists(array $parameters, string $schemaFile): void
    {
        self::ensureSchemaFileExists($schemaFile);

        $databaseName = $parameters['dbname'];
        $parametersWithoutDatabaseName = dissoc($parameters, 'dbname');
        $connection = DriverManager::getConnection($parametersWithoutDatabaseName);
        $platform = new MariaDBPlatform();
        $schemaManager = new MySQLSchemaManager($connection, $platform);

        if (!self::databaseExists($databaseName, $schemaManager)) {
            $schemaManager->createDatabase($databaseName);
            $connection->exec(sprintf('USE %s', $databaseName));
            $connection->exec(file_get_contents(realpath($schemaFile)));
        }

        $connection->close();
    }

    /**
     * @throws Exception
     */
    private static function databaseExists($databaseName, MySqlSchemaManager $schemaManager): bool
    {
        return in_array($databaseName, $schemaManager->listDatabases(), true);
    }

    private static function ensureSchemaFileExists(string $schemaFile): void
    {
        if (!file_exists($schemaFile)) {
            throw new RuntimeException(sprintf('The file <%s> does not exist', $schemaFile));
        }
    }

    private static function createConfiguration(array $contextPrefixes, bool $isDevMode): Configuration
    {
        $config = ORMSetup::createConfiguration($isDevMode);

        $config->setMetadataDriverImpl(new SimplifiedXmlDriver(array_merge(self::$sharedPrefixes, $contextPrefixes)));

        return $config;
    }
}
