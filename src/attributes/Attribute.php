<?php

namespace Outline\Plain\Html\Attributes;

use Outline\Plain\Html\Core\Abstraction\AbstractAttribute;
use Outline\Plain\Html\Core\Enumeration\EnumAttribute;
use Outline\Plain\Html\Core\Enumeration\EnumInput;

class Attribute extends AbstractAttribute
{
    public function __construct(EnumAttribute $attribute, string|EnumInput $value)
    {
        parent::__construct($attribute, $value);
    }

    public function attribute(): string
    {
        return "";
    }
}