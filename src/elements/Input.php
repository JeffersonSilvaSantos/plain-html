<?php
declare(strict_types=1);

namespace Outline\Plain\Html\Elements;

use Outline\Plain\Html\Core\Abstraction\AbstractElement;
use Outline\Plain\Html\Core\Enumeration\EnumElement;

/**
 * @author Jefferson Silva Santos
 */
class Input extends AbstractElement
{
    public function __construct()
    {
        parent::__construct(EnumElement::HTML_INPUT);
    }
}