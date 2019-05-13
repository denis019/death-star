<?php

namespace App\Ship\Dto;

use App\Ship\Dto\Exceptions\SingleTypeException;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Type;

/**
 * Trait TypeResolverTrait
 * @package App\Ship\Dto
 */
trait TypeResolverTrait
{
    /**
     * @param $attribute
     * @param $value
     * @return AbstractDto
     */
    protected function getValueByType($attribute, $value)
    {
        if (is_object($value)) {
            return $value;
        }

        /** @var PropertyInfoExtractor $docExtractor */
        $docExtractor = $this->docExtractor;

        /** @var Type[] $types */
        $types = $docExtractor->getTypes(get_class($this), $attribute);

        if (!is_null($types)) {
            if (count($types) > 1) {
                throw new SingleTypeException();
            }

            if (isset($types[0])) {
                $value = $this->resolveTypes($types[0], $value);
            }
        }

        return $value;
    }

    /**
     * @param Type $type
     * @param $value
     * @return AbstractDto
     */
    public function resolveTypes(Type $type, $value)
    {
        $object = null;

        switch ($type->getBuiltinType()) {
            case 'object':
                if ($className = $type->getClassName()) {
                    $value = $this->resolveClass($className, $value);
                }
                break;
            case 'array';
                if ($type->getCollectionKeyType() && $className = $type->getCollectionValueType()->getClassName()) {
                    $value = $this->resolveArrayClass($className, $value);
                }
                break;
        }

        return $value;
    }

    /**
     * @param string $className
     * @param $value
     * @return AbstractDto
     */
    public function resolveClass(string $className, $value)
    {
        /** @var AbstractDto $dto */
        if(!(($dto = new $className()) instanceof AbstractDto) || is_null($value)) {
            return $value;
        }

        $dto->init($value);
        return $dto;
    }

    public function resolveArrayClass(string $className, $value)
    {
        $result = [];

        if(!(new $className() instanceof AbstractDto)) {
            return $value;
        }

        $value = array_wrap($value);
        foreach ($value as $singleValue) {
            /** @var AbstractDto $dto */
            $dto = new $className();

            $dto->init($singleValue);
            $result[] = $dto;
        }

        return $result;
    }
}
