<?php declare(strict_types=1);

namespace Json\Test;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class TestEntity extends Entity
{
    use EntityIdTrait;

    protected array $tags;

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }
}
