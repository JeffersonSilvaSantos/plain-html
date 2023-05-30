<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Enumeration;

/**
 * @author Jefferson Silva Santos
 */
enum EnumInput: string
{

    case INPUT_TYPE_BUTTON         = "button";
    case INPUT_TYPE_CHECKBOX       = "checkbox";
    case INPUT_TYPE_COLOR          = "color";
    case INPUT_TYPE_DATE           = "date";
    case INPUT_TYPE_DATETIME_LOCAL = "datetime-local";
    case INPUT_TYPE_EMAIL          = "email";
    case INPUT_TYPE_FILE           = "file";
    case INPUT_TYPE_HIDDEN         = "hidden";
    case INPUT_TYPE_IMAGE          = "image";
    case INPUT_TYPE_MONTH          = "month";
    case INPUT_TYPE_NUMBER         = "number";
    case INPUT_TYPE_PASSWORD       = "password";
    case INPUT_TYPE_RADIO          = "radio";
    case INPUT_TYPE_RANGE          = "range";
    case INPUT_TYPE_RESET          = "reset";
    case INPUT_TYPE_SEARCH         = "search";
    case INPUT_TYPE_SUBMIT         = "submit";
    case INPUT_TYPE_TEL            = "tel";
    case INPUT_TYPE_TEXT           = "text";
    case INPUT_TYPE_TIME           = "time";
    case INPUT_TYPE_URL            = "url";
    case INPUT_TYPE_WEEK           = "week";
}
