<?php declare(strict_types=1);

namespace Json\Test;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\JsonField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class TestEntityDefinition extends EntityDefinition
{

    public function getEntityName(): string
    {
        return 'test';
    }

    public function getEntityClass(): string
    {
        return TestEntity::class;
    }

    public function getCollectionClass(): string
    {
        return TestCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new JsonField('tags', 'tags', [], [])
        ]);
    }
}
