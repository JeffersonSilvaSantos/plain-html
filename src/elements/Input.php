<?php
declare(strict_types=1);

namespace Outline\Plain\Html\Elements;

use Outline\Plain\Html\Attribute\Attribute;
use Outline\Plain\Html\Core\Abstraction\Element;
use Outline\Plain\Html\Core\Enumeration\AttributeName;
use Outline\Plain\Html\Core\Enumeration\ElementName;
use Outline\Plain\Html\Core\Enumeration\InputType;

/**
 * @author Jefferson Silva Santos
 */
final class Input extends Element
{
    public function __construct()
    {
        parent::__construct(ElementName::HTML_INPUT);
    }

    //in development
    public function input(InputType $inputType, string $id, string $class, Attribute ...$additional): string
    {
        return $this->element_opening().$this->element_closing();
    }

    //in development
    public function required_attributes(string $id, string $class, $type)
    {
        $this->attribute($id, $class,
            new Attribute(AttributeName::ATT_TYPE, $type)
        );
    }

    public function txt(string $id, string $class, bool $required): string
    {
        $this->attribute(
            $id,
            $class,
            new Attribute(AttributeName::ATT_TYPE, InputType::INPUT_TYPE_TEXT->value),
            new Attribute(AttributeName::ATT_REQUIRED, $required)
        );
        return $this->element_opening().$this->element_closing();
    }

    public function password(string $id, string $class): string
    {
        $this->attribute(
            $id,
            $class,
            new Attribute(AttributeName::ATT_TYPE, InputType::INPUT_TYPE_PASSWORD->value),
            new Attribute(AttributeName::ATT_REQUIRED, true)
        );
        return $this->element_opening().$this->element_closing();
    }
}