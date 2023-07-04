<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Abstraction;

use Outline\Plain\Html\Attribute\Attribute;
use Outline\Plain\Html\Attribute\AttributeApplier;
use Outline\Plain\Html\Core\Enumeration\AttributeName;
use Outline\Plain\Html\Core\Enumeration\ElementName;

/**
 * @author Jefferson Silva Santos
 */
abstract class Element
{

    /**
     * @var AttributeApplier
     */
    private AttributeApplier $applier;

    /**
     * @var string
     */
    private string $close;

    /**
     * @param ElementName $element
     */
    public function __construct(ElementName $element)
    {
        $this->applier = new AttributeApplier($element);
        $this->close = $this->config_closing_element($element);
    }

    /**
     * @param ElementName $element
     * @return string in this format "empty" or "</element>" if there is a closure
     */
    private function config_closing_element(ElementName $element): string
    {
        return in_array($element->name, [
            ElementName::HTML_FORM->name,
            ElementName::HTML_DATALIST->name,
            ElementName::HTML_OPTION->name,
            ElementName::HTML_STYLE->name,
            ElementName::HTML_LABEL->name,
            ElementName::HTML_SECTION->name,
            ElementName::HTML_ARTICLE->name,
            ElementName::HTML_ASIDE->name,
            ElementName::HTML_DIV->name,
            ElementName::HTML_NAV->name,
            ElementName::HTML_TITLE->name
        ]) ? "</$element->value>" : "";
    }

    /**
     * @param string $id
     * @param string $class
     * @param Attribute ...$attribute
     * @return void
     */
    protected function attribute(string $id, string $class, Attribute ...$attribute): void
    {
        $id = new Attribute(AttributeName::GLOBAL_ATT_ID, $id);
        $class = new Attribute(AttributeName::GLOBAL_ATT_CLASS, $class);
        $attribute[] = $id;
        $attribute[] = $class;
        $this->applier->setAttribute($attribute);
    }

    /**
     * @return string|null
     */
    public function element_id(): ?string
    {
        return $this->applier->id();
    }

    /**
     * @return string
     */
    public function element_opening(): string
    {
        return $this->applier->opening();
    }

    /**
     * @return string in this format "empty" or "</element>" if there is a closure.
     */
    protected function element_closing(): string
    {
        return $this->close;
    }

}