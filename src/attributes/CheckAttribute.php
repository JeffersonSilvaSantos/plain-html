<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Attributes;

use Outline\Plain\Html\Core\Enumeration\EnumAttribute;
use Outline\Plain\Html\Core\Enumeration\EnumInput;

/**
 * @author Jefferson Silva Santos
 */
trait CheckAttribute
{
    /**
     * @param string $attribute
     * @return bool
     */
    protected function receive_value(string $attribute): bool
    {
        $list =  [
            EnumAttribute::ATT_TYPE->value,
            EnumAttribute::ATT_NAME->value,
            EnumAttribute::ATT_SIZE->value,
            EnumAttribute::ATT_FOR->value,
            EnumAttribute::ATT_MAX->value,
            EnumAttribute::ATT_MAXLENGTH->value,
            EnumAttribute::ATT_MIN->value,
            EnumAttribute::ATT_MINLENGTH->value,
            EnumAttribute::GLOBAL_ATT_CLASS->value,
            EnumAttribute::GLOBAL_ATT_ID->value,
            EnumAttribute::ATT_AUTOCOMPLETE->value,
            EnumAttribute::ATT_PLACEHOLDER->value,
            EnumAttribute::ATT_DIRNAME->value,
            EnumAttribute::ATT_LIST->value,
            EnumAttribute::ATT_VALUE->value,
            EnumAttribute::ATT_PATTERN->value,
        ];
        return in_array($attribute, $list);
    }

    /**
     * @param EnumAttribute $attribute
     * @param string|int $value
     * @return string
     */
    protected function filter_value(EnumAttribute $attribute, string|int $value): string
    {

        return match ($attribute->value) {
            EnumAttribute::ATT_AUTOCOMPLETE->value => $value ? "on" : "off",
            EnumAttribute::ATT_SIZE->value,
                EnumAttribute::ATT_MAXLENGTH->value,
                EnumAttribute::ATT_MIN->value,
                EnumAttribute::ATT_MINLENGTH->value => is_numeric($value)? "$value" : "0",
            default => "$value"
        };
    }




}