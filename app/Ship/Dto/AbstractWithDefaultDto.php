<?php

namespace App\Ship\Dto;

/**
 * Class AbstractWithDefaultDto
 * @package App\Ship\Dto
 */
abstract class AbstractWithDefaultDto extends AbstractDto
{

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->setDefaultAttributes();
    }

    protected function setDefaultAttributes()
    {
        foreach ($this->getDefaultAttributes() as $attribute => $value) {
            $attribute = $this->formatAttribute($attribute);

            if (!$this->hasAttributeSet($attribute) && property_exists(get_class($this), $attribute)) {
                $value = $this->getValueByType($attribute, $value);

                $this->$attribute = $value;
                $this->addAttributeSet($attribute);
            }
        }
    }

    abstract function getDefaultAttributes(): array;
}