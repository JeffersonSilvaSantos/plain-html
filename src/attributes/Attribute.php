<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Attributes;

use Outline\Plain\Html\Core\Abstraction\AbstractAttribute;
use Outline\Plain\Html\Core\Enumeration\EnumAttribute;
use Outline\Plain\Html\Core\Enumeration\EnumInput;

/**
 * @author Jefferson Silva Santos
 */
class Attribute extends AbstractAttribute
{
    use CheckAttribute;

    /**
     * @var string
     */
    private string $attribute_name;

    /**
     * @var string
     */
    private string $attribute_value;

    /**
     * @param EnumAttribute $attribute
     * @param string|int|bool|EnumInput $value
     */
    public function __construct(EnumAttribute $attribute, string|int|bool|EnumInput $value)
    {
        $this->config_attribute($attribute,$value);
        parent::__construct($attribute, $this->attribute_value);
    }

    /**
     * @param EnumAttribute $attribute
     * @param string|int|bool|EnumInput $value
     * @return void
     */
    private function config_attribute(EnumAttribute $attribute, string|int|bool|EnumInput $value): void
    {
        $this->attribute_name = $attribute->value;
        $this->attribute_value = $this->filter_value($attribute, $value);
    }

    /**
     * @return string
     */
    public function attribute(): string
    {
        if (!$this->receive_value($this->attribute_name)) return $this->attribute_name;
        return "";
    }
}