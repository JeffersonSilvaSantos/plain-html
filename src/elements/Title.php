<?php

namespace Outline\Plain\Html\Elements;

use Outline\Plain\Html\Attribute\Attribute;
use Outline\Plain\Html\Core\Abstraction\Element;
use Outline\Plain\Html\Core\Enumeration\AttributeName;
use Outline\Plain\Html\Core\Enumeration\ElementName;

final class Title extends Element
{
    public function __construct()
    {
        parent::__construct(ElementName::HTML_TITLE);
    }

    public function title(string $id, string $title): string
    {
       $this->attribute(
           new Attribute(AttributeName::GLOBAL_ATT_ID, $id)
       );
       return $this->element_opening().$title.$this->element_closing();
    }
}