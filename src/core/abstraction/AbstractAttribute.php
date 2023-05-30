<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Abstraction;

use Outline\Plain\Html\Core\Enumeration\EnumAttribute;
use Outline\Plain\Html\Core\Enumeration\EnumInput;

/**
 * @author Jefferson Silva Santos
 */
abstract class AbstractAttribute
{
    /**
     * @var string
     */
    protected string $attribute;

    /**
     * @var string
     */
    protected string $value;

    /**
     * @param EnumAttribute $attribute
     * @param string $value
     */
    public function __construct(EnumAttribute $attribute, string $value)
    {
        $this->attribute = $attribute->value;
        $this->value = $value;
    }

    /**
     * @return string "attribute" if the attribute is boolean or "attribute="value"|attribute='value'|attribute=value"
     * if the attribute takes value
     */
    public abstract function attribute(): string;
}