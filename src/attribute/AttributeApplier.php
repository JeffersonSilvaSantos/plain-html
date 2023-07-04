<?php

namespace Outline\Plain\Html\Attribute;

use Outline\Plain\Html\Core\Enumeration\AttributeName;
use Outline\Plain\Html\Core\Enumeration\ElementName;
use Outline\Plain\Html\Core\Trait\Support;

/**
 * @author Jefferson Silva Santos
 */
class AttributeApplier
{
    use Support;

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
     * @var array[]
     */
    private array $attribute_storage;

    /**
     * @var array
     */
    private array $classes_storage;

    /**
     * @param ElementName $element
     */
    public function __construct(ElementName $element)
    {
        $this->element = $element;
        $this->id = null;
        $this->attribute = null;
        $this->classes_storage = [];
        $this->attribute_storage = ['attributes' => [], 'data' => []];
        $this->attributeConvert = new AttributeConvert();
    }

    /**
     * @param array $attributes the elements of this data array must be of type Attribute
     * @return void
     */
    public function setAttribute(array $attributes): void
    {
        $classes_storage = [];

        foreach ($attributes as $attribute) {
            if (!is_null($this->attributeConvert->convert($attribute))){
                match ($attribute->name()) {
                    AttributeName::GLOBAL_ATT_CLASS->value => $classes_storage = $this->many_classes($attribute->value(),$classes_storage),
                    default => $this->storage($attribute)
                };
            }
        }

        $class_value = implode($this->space(), $classes_storage);
        $class = new Attribute(AttributeName::GLOBAL_ATT_CLASS, $class_value);

        if (!empty($classes_storage) && $this->permission($class) && !empty($class_value)) {
            $this->attribute_storage['data'][] = $this->attributeConvert->convert($class);
        }
        $this->attribute = implode($this->space(), $this->attribute_storage['data']);
        $this->storage(null);
    }

    /**
     * @param string $class
     * @param array $array
     * @return array
     */
    private function many_classes(string $class, array $array): array
    {
        $class = $this->filter_keywords($class,"");
        if (!in_array($class, $array)) {
            $array[] = $class;
        }
        return $array;
    }

    /**
     * @param Attribute|null $action
     * @return void
     */
    private function storage(Attribute|null $action): void
    {
        if ($action instanceof Attribute){
            if (!in_array($action->name(), $this->attribute_storage['attributes'])) {
                if ($this->permission($action)) {
                    if ($action->name() == AttributeName::GLOBAL_ATT_ID->value) {
                        $this->id = $this->filter_keywords($action->value(),"invalid");
                    }
                    $this->attribute_storage['attributes'][] = $action->name();
                    $this->attribute_storage['data'][] = $this->attributeConvert->convert($action);
                }
            }
        }
        if (is_null($action)) {
            $this->attribute_storage['attributes'] = [];
            $this->attribute_storage['data'] = [];
        }

    }

    /**
     * @return string
     */
    private function attribute(): string
    {
        return empty($this->attribute) ? "" : ($this->space() . $this->attribute);
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
            "GLOBAL_ATT_CLASS"           => [
                ElementName::HTML_INPUT
            ],
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
            "ATT_PLACEHOLDER"            => [
                ElementName::HTML_INPUT
            ],
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

    /**
     * @return string
     */
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

    /**
     * @return string
     */
    public function opening(): string
    {
        return $this->open().$this->attribute().$this->close();
    }
}