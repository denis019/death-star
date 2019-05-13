<?php

namespace App\Ship\Dto;

use Illuminate\Support\Collection;

/**
 * Class AbstractCollection
 * @package App\Ship\Dto
 */
abstract class AbstractCollectionDto extends Collection implements DtoInterface
{

    abstract protected function getDto(): string;

    /**
     * @param $object
     * @return bool
     */
    protected function isValidObject($object)
    {
        return is_a($object, $this->getDto());
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (!$this->isValidObject($value)) {
            throw new \InvalidArgumentException('Invalid type for collection "' . get_class($this) . '"');
        }

        parent::offsetSet($offset, $value);
    }

    public function init($items)
    {
        foreach ($items as $item) {
            $dto = call_user_func($this->getDto(). '::make', $item);
            $this->push($dto);
        }
    }
}
