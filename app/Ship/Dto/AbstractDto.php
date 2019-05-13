<?php

namespace App\Ship\Dto;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\App;
use JsonSerializable;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

/**
 * Class AbstractDto
 * @package App\Ship\Dto
 */
abstract class AbstractDto implements JsonSerializable, Jsonable, Arrayable, DtoInterface
{
    use TypeResolverTrait;

    protected $hidden = [];

    /**
     * @var PropertyInfoExtractor
     * http://symfony.com/doc/master/components/property_info.html#phpdocextractor
     */
    protected $docExtractor;

    /**
     * @var array
     */
    private $attributesSet = [];

    protected $camelCase = true;

    /**
     * AbstractDto constructor.
     * @param array|\stdClass $attributes
     */
    public function __construct($attributes = [])
    {
        $this->docExtractor = App::make(PhpDocExtractor::class);
        $this->init($attributes);
    }

    /**
     * @param array $attributes
     * @return static
     */
    public static function make($attributes = [])
    {
        return new static($attributes);
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set(string $name, $value)
    {
        $this->removeAttributeSet($name);
        $this->$name = $value;
        $this->addAttributeSet($name);
    }

    /**
     * @param string $attribute
     */
    public function addAttributeSet(string $attribute)
    {
        $this->attributesSet[] = $attribute;
    }

    /**
     * @param string $attribute
     * @return bool
     */
    public function hasAttributeSet(string $attribute)
    {
        return in_array($attribute, $this->attributesSet);
    }

    /**
     * return an array of this object's properties
     * @return array
     */
    public function toArray()
    {
        $transformed = [];
        if (!empty($this->attributesSet)) {

            foreach ($this->attributesSet as $attribute) {
                if (!in_array($attribute, $this->hidden)) {
                    $transformed[$attribute] = $this->$attribute;
                }
            }
        }

        return $transformed;
    }

    /**
     * TODO refactor this, for the DB we will always use snake case
     * return an array of this object's properties
     * @return array
     */
    public function toArraySnakeCase()
    {
        $transformed = [];

        if (!empty($this->attributesSet)) {
            foreach ($this->attributesSet as $attribute) {

                if (!in_array($attribute, $this->hidden)) {
                    if($this->$attribute instanceof AbstractDto)
                    {
                        $transformed[snake_case($attribute)] = $this->$attribute->toArraySnakeCase();
                    } else {
                        $transformed[snake_case($attribute)] = $this->$attribute;
                    }
                }
            }
        }

        return $transformed;
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param  int $options
     * @return string
     *
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);
        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @param $attributes
     * @return $this
     */
    public function init($attributes)
    {
        if (is_object($attributes)) {
            $attributes = get_object_vars($attributes);
        }

        foreach ($attributes as $attribute => $value) {
            $attribute = $this->formatAttribute($attribute);

            if (property_exists(get_class($this), $attribute)) {
                $value = $this->getValueByType($attribute, $value);

                $this->$attribute = $value;
                $this->addAttributeSet($attribute);
            }
        }

        return $this;
    }

    /**
     * @param $attribute
     */
    public function removeAttributeSet($attribute)
    {
        if (($key = array_search($attribute, $this->attributesSet)) !== false) {
            unset($this->attributesSet[$key]);
        }
    }

    /**
     * @param $attribute
     * @return string
     */
    protected function formatAttribute(string $attribute): string
    {
        return $this->camelCase ? camel_case($attribute) : snake_case($attribute);
    }
}
