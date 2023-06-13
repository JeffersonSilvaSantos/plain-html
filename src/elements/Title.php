<?php

namespace Outline\Plain\Html\Elements;

use Outline\Plain\Html\Core\Abstraction\AbstractElement;
use Outline\Plain\Html\Core\Enumeration\EnumElement;

class Title extends AbstractElement
{
    public function __construct()
    {
        parent::__construct(EnumElement::HTML_TITLE);
    }

    public function title(string $title): string
    {
        return $this->open_element.$this->attribute().$this->close().$title.$this->closing_element();
    }
}