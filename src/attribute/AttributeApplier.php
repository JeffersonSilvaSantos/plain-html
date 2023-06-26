<?php

namespace Outline\Plain\Html\Attribute;

use Outline\Plain\Html\Core\Enumeration\AttributeName;
use Outline\Plain\Html\Core\Enumeration\ElementName;

/**
 * @author Jefferson Silva Santos
 */
class AttributeApplier
{
    /**
     * @var ElementName
     */
    private ElementName $element;

    /**
     * @var AttributeConvert
     */
    private AttributeConvert $attributeConvert;

    /**
     * @var string|null
     */
    private null|string $id;

    /**
     * @var string|null
     */
    private null|string $attribute;

    /**
     * @var array
     */
    private array $attributes;

    /**
     * @param ElementName $element
     */
    public function __construct(ElementName $element)
    {
        $this->element = $element;
        $this->id = null;
        $this->attribute = null;
        $this->attributes = [];
        $this->attributeConvert = new AttributeConvert();
    }

    /**
     * @param array $attributes the elements of this data array must be of type Attribute
     * @return void
     */
    public function setAttribute(array $attributes): void
    {
        $data = [];
        foreach ($attributes as $attribute) {
            if (!is_null($this->attributeConvert->convert($attribute))) {
                if (!in_array($attribute->name(), $this->attributes)) {
                    $this->attributes[] = $attribute->name();
                    if ($this->permission($attribute)){
                        if (AttributeName::GLOBAL_ATT_ID->value == $attribute->name()) $this->id = $attribute->value();
                        $data[] = $this->attributeConvert->convert($attribute);
                    }
                }
            }
        }
        $this->attribute = implode(" ", $data);
    }

    /**
     * @return string
     */
    private function attribute(): string
    {
        return empty($this->attribute) ? "" : "\t".$this->attribute;
    }

    /**
     * @param AttributeName $attribute
     * @return array
     */
    private function attributes(AttributeName $attribute): array
    {
        $attributes = [
            "GLOBAL_ATT_ID"              => [
                ElementName::HTML_INPUT,
                ElementName::HTML_TITLE
            ],
            "GLOBAL_ATT_ACCESSKEY"       => [],
            "GLOBAL_ATT_AUTOCAPITALIZE"  => [],
            "GLOBAL_ATT_AUTOFOCUS"       => [],
            "GLOBAL_ATT_CLASS"           => [],
            "GLOBAL_ATT_CONTENTEDITABLE" => [],
            "GLOBAL_ATT_DATA"            => [],
            "GLOBAL_ATT_DIR"             => [],
            "GLOBAL_ATT_DRAGGABLE"       => [],
            "GLOBAL_ATT_ENTERKEYHINT"    => [],
            "GLOBAL_ATT_EXPORTPARTS"     => [],
            "GLOBAL_ATT_HIDDEN"          => [],
            "GLOBAL_ATT_INERT"           => [],
            "GLOBAL_ATT_INPUTMODE"       => [],
            "GLOBAL_ATT_IS"              => [],
            "GLOBAL_ATT_ITEMID"          => [],
            "GLOBAL_ATT_ITEMPROP"        => [],
            "GLOBAL_ATT_ITEMREF"         => [],
            "GLOBAL_ATT_ITEMSCOPE"       => [],
            "GLOBAL_ATT_ITEMTYPE"        => [],
            "GLOBAL_ATT_LANG"            => [],
            "GLOBAL_ATT_NONCE"           => [],
            "GLOBAL_ATT_PART"            => [],
            "GLOBAL_ATT_EXPERIMENTAL"    => [],
            "GLOBAL_ATT_SLOT"            => [],
            "GLOBAL_ATT_SPELLCHECK"      => [],
            "GLOBAL_ATT_STYLE"           => [],
            "GLOBAL_ATT_TABINDEX"        => [],
            "GLOBAL_ATT_TITLE"           => [],
            "GLOBAL_ATT_TRANSLATE"       => [],
            "ATT_CHECKED"                => [],
            "ATT_ACCEPT"                 => [],
            "ATT_AUTOCOMPLETE"           => [],
            "ATT_CAPTURE"                => [],
            "ATT_CROSSORIGIN"            => [],
            "ATT_DISABLED"               => [],
            "ATT_ELEMENTTIMING"          => [],
            "ATT_FOR"                    => [],
            "ATT_MAX"                    => [],
            "ATT_MAXLENGTH"              => [],
            "ATT_MIN"                    => [],
            "ATT_MINLENGTH"              => [],
            "ATT_MULTIPLE"               => [],
            "ATT_PATTERN"                => [],
            "ATT_READONLY"               => [],
            "ATT_REL"                    => [],
            "ATT_REQUIRED"               => [
                ElementName::HTML_INPUT
            ],
            "ATT_PLACEHOLDER"            => [],
            "ATT_SIZE"                   => [],
            "ATT_STEP"                   => [],
            "ATT_NAME"                   => [],
            "ATT_TYPE"                   => [
                ElementName::HTML_INPUT
            ],
            "ATT_DIRNAME"                => [],
            "ATT_LIST"                   => [],
            "ATT_VALUE"                  => [],
        ];
        return $attributes[$attribute->name];
    }

    /**
     * @param Attribute $attribute
     * @return bool
     */
    private function permission(Attribute $attribute): bool
    {
        return in_array($this->element, $this->attributes($attribute->attribute()));
    }

    /**
     * @return string in this format "empty" or "<element".
     */
    private function open(): string
    {
        return "<".$this->element->value;
    }

    private function close(): string
    {
        return ">";
    }

    /**
     * @return string|null
     */
    public function id(): ?string
    {
        return $this->id;
    }
    public function opening(): string
    {
        return $this->open().$this->attribute().$this->close();
    }
}