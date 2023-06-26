<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Attribute;

use Outline\Plain\Html\Core\Enumeration\AttributeName;

/**
 * @author Jefferson Silva Santos
 */
final readonly class Attribute
{

    /**
     * @var AttributeName
     */
    private AttributeName $attribute_name;

    /**
     * @var string|bool
     */
    private string|bool $value;

    /**
     * @param AttributeName $attribute
     * @param string|bool $value
     */
    public function __construct(AttributeName $attribute, string|bool $value)
    {
        $this->attribute_name = $attribute;
        $this->value = $value;
    }

    /**
     * @return AttributeName
     */
    public function attribute(): AttributeName
    {
        return $this->attribute_name;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->attribute_name->value;
    }

    public function value(): string|bool
    {
        return $this->value;
    }
}