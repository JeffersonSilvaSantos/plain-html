<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Abstraction;

use Outline\Plain\Html\Core\Enumeration\EnumElement;

/**
 * @author Jefferson Silva Santos
 */
abstract class AbstractElement
{

    /**
     * @var EnumElement
     */
    protected EnumElement $enumElement;

    /**
     * @var string
     */
    protected string $open_element;

    /**
     * @var string
     */
    protected string $close_element;

    /**
     * @param EnumElement $enumElement
     */
    public function __construct(EnumElement $enumElement)
    {
        $this->enumElement = $enumElement;
        $this->open_element = "<$enumElement->value";

        $this->close_element = $this->define_closing_element($enumElement);
    }

    /**
     * @param EnumElement $element
     * @return string in this format "empty" or "</element>" if there is a closure
     */
    private function define_closing_element(EnumElement $element): string
    {
        return in_array($element->name, [
            EnumElement::HTML_FORM->name,
            EnumElement::HTML_DATALIST->name,
            EnumElement::HTML_OPTION->name,
            EnumElement::HTML_STYLE->name,
            EnumElement::HTML_LABEL->name,
            EnumElement::HTML_SECTION->name,
            EnumElement::HTML_ARTICLE->name,
            EnumElement::HTML_ASIDE->name,
            EnumElement::HTML_DIV->name,
            EnumElement::HTML_NAV->name,
            EnumElement::HTML_TITLE->name
        ]) ? "</$element->value>" : "";
    }

    /**
     * @param AbstractAttribute ...$attribute
     * @return string ex: ' id="value" name="value" class="value" required'
     */
    protected function attribute(AbstractAttribute ...$attribute): string
    {
        $attributes = "";
        foreach ($attribute as $item) {
            $attributes .= " ".$item->attribute();
        }
        return $attributes;
    }

    /**
     * @return string in this format "empty" or "<element".
     */
    protected function open_element(): string
    {
        return $this->open_element;
    }

    protected function close(): string
    {
        return ">";
    }

    /**
     * @return string in this format "empty" or "</element>" if there is a closure.
     */
    protected function closing_element(): string
    {
        return $this->close_element;
    }


}