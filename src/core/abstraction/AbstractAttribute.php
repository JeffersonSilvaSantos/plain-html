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
    protected EnumAttribute $attribute;

    protected string|EnumInput $value;

    public function __construct(EnumAttribute $attribute, string|EnumInput $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * @return string "attribute" if the attribute is boolean or "attribute="value"|attribute='value'|attribute=value"
     * if the attribute takes value
     */
    public abstract function attribute(): string;
}