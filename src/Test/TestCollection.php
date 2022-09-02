<?php declare(strict_types=1);

namespace Json\Test;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class TestCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return TestEntity::class;
    }
}
