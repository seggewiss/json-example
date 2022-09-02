<?php declare(strict_types=1);

namespace Json\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Migration\MigrationStep;
use Shopware\Core\Framework\Uuid\Uuid;

class Migration1662097900Tags extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1662097900;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS `test` (
    `id` BINARY(16),
    `tags` JSON NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.test.tags` CHECK (JSON_VALID(`tags`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE = utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($query);

        $connection->insert(
            'test',
            [
                'id' => Uuid::randomBytes(),
                'tags' => \json_encode([]),
                'created_at' => (new \DateTime())->format(Defaults::STORAGE_DATE_TIME_FORMAT)
            ]
        );

        $connection->insert(
            'test',
            [
                'id' => Uuid::randomBytes(),
                'tags' => \json_encode(['1', '2', '3']),
                'created_at' => (new \DateTime())->format(Defaults::STORAGE_DATE_TIME_FORMAT),
            ]
        );
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
