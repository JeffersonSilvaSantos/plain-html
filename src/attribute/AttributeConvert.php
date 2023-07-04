<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Attribute;

use Outline\Plain\Html\Core\Enumeration\AttributeName;
use Outline\Plain\Html\Core\Trait\Support;

/**
 * @author Jefferson Silva Santos
 */
class AttributeConvert
{
    use Support;

    /**
     * @param Attribute $attribute
     * @return string|null "attribute"|"" if the attribute is boolean
     * or "attribute="value"|attribute='value'|attribute=value"
     * if the attribute takes value
     */
    public function convert(Attribute $attribute): string|null
    {
        if (!$this->receive_value($attribute->attribute())) {
            return ($this->filter_value($attribute->attribute(), $attribute->value())) ? $attribute->name() : null;
        }
        return $attribute->name().$this->separator().$this->filter_value($attribute->attribute(),$attribute->value());
    }

    /**
     * @param AttributeName $attribute
     * @return bool
     */
    private function receive_value(AttributeName $attribute): bool
    {
        $list =  [
            AttributeName::ATT_TYPE,
            AttributeName::ATT_NAME,
            AttributeName::ATT_SIZE,
            AttributeName::ATT_FOR,
            AttributeName::ATT_MAX,
            AttributeName::ATT_MAXLENGTH,
            AttributeName::ATT_MIN,
            AttributeName::ATT_MINLENGTH,
            AttributeName::GLOBAL_ATT_CLASS,
            AttributeName::GLOBAL_ATT_ID,
            AttributeName::ATT_AUTOCOMPLETE,
            AttributeName::ATT_PLACEHOLDER,
            AttributeName::ATT_DIRNAME,
            AttributeName::ATT_LIST,
            AttributeName::ATT_VALUE,
            AttributeName::ATT_PATTERN,
        ];
        return in_array($attribute, $list);
    }

    /**
     * @param AttributeName $attribute
     * @param string|bool $value
     * @return string|bool
     */
    private function filter_value(AttributeName $attribute, string|bool $value): string|bool
    {
        if (!$this->receive_value($attribute) && !is_bool($value)) {
            $value = $this->conversion_bool($value);
        }

        $value = match ($attribute) {
            AttributeName::ATT_REQUIRED,
            AttributeName::ATT_CHECKED => $value,
            AttributeName::ATT_AUTOCOMPLETE => $this->on_off($value),
            AttributeName::ATT_SIZE,
            AttributeName::ATT_MAXLENGTH,
            AttributeName::ATT_MIN,
            AttributeName::ATT_MINLENGTH => $this->conversion_numeric($value),
            AttributeName::ATT_PLACEHOLDER =>
            $this->filter_keywords($value,"invalid") == 'invalid' ? "write here..." : $value,
            default => "$value"
        };
        return is_string($value) ? $this->value($this->filter_keywords($value,"invalid")) : $value;
    }

    /**
     * @return string
     */
    private function separator(): string
    {
        return "=";
    }

    /**
     * @param string $value
     * @return string
     */
    private function value(string $value): string
    {
        return "\"$value\"";
    }
}