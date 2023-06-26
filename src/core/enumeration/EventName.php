<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Enumeration;

/**
 * @author Jefferson Silva Santos
 */
enum EventName: string
{

    case HTML_EVENT_ONABORT             = "onabort";
    case HTML_EVENT_ONAUTOCOMPLETE      = "onautocomplete";
    case HTML_EVENT_ONAUTOCOMPLETEERROR = "onautocompleteerror";
    case HTML_EVENT_ONBLUR              = "onblur";
    case HTML_EVENT_ONCANCEL            = "oncancel";
    case HTML_EVENT_ONCANPLAY           = "oncanplay";
    case HTML_EVENT_ONCANPLAYTHROUGH    = "oncanplaythrough";
    case HTML_EVENT_ONCHANGE            = "onchange";
    case HTML_EVENT_ONCLICK             = "onclick";
    case HTML_EVENT_ONCLOSE             = "onclose";
    case HTML_EVENT_ONCONTEXTMENU       = "oncontextmenu";
    case HTML_EVENT_ONCUECHANGE         = "oncuechange";
    case HTML_EVENT_ONDBLCLICK          = "ondblclick";
    case HTML_EVENT_ONDRAG              = "ondrag";
    case HTML_EVENT_ONDRAGEND           = "ondragend";
    case HTML_EVENT_ONDRAGENTER         = "ondragenter";
    case HTML_EVENT_ONDRAGEXIT          = "ondragexit";
    case HTML_EVENT_ONDRAGLEAVE         = "ondragleave";
    case HTML_EVENT_ONDRAGOVER          = "ondragover";
    case HTML_EVENT_ONDRAGSTART         = "ondragstart";
    case HTML_EVENT_ONDROP              = "ondrop";
    case HTML_EVENT_ONDURATIONCHANGE    = "ondurationchange";
    case HTML_EVENT_ONEMPTIED           = "onemptied";
    case HTML_EVENT_ONENDED             = "onended";
    case HTML_EVENT_ONERROR             = "onerror";
    case HTML_EVENT_ONFOCUS             = "onfocus";
    case HTML_EVENT_ONINPUT             = "oninput";
    case HTML_EVENT_ONINVALID           = "oninvalid";
    case HTML_EVENT_ONKEYDOWN           = "onkeydown";
    case HTML_EVENT_ONKEYPRESS          = "onkeypress";
    case HTML_EVENT_ONKEYUP             = "onkeyup";
    case HTML_EVENT_ONLOAD              = "onload";
    case HTML_EVENT_ONLOADEDDATA        = "onloadeddata";
    case HTML_EVENT_ONLOADEDMETADATA    = "onloadedmetadata";
    case HTML_EVENT_ONLOADSTART         = "onloadstart";
    case HTML_EVENT_ONMOUSEDOWN         = "onmousedown";
    case HTML_EVENT_ONMOUSEENTER        = "onmouseenter";
    case HTML_EVENT_ONMOUSELEAVE        = "onmouseleave";
    case HTML_EVENT_ONMOUSEMOVE         = "onmousemove";
    case HTML_EVENT_ONMOUSEOUT          = "onmouseout";
    case HTML_EVENT_ONMOUSEOVER         = "onmouseover";
    case HTML_EVENT_ONMOUSEUP           = "onmouseup";
    case HTML_EVENT_ONMOUSEWHEEL        = "onmousewheel";
    case HTML_EVENT_ONPAUSE             = "onpause";
    case HTML_EVENT_ONPLAY              = "onplay";
    case HTML_EVENT_ONPLAYING           = "onplaying";
    case HTML_EVENT_ONPROGRESS          = "onprogress";
    case HTML_EVENT_ONRATECHANGE        = "onratechange";
    case HTML_EVENT_ONRESET             = "onreset";
    case HTML_EVENT_ONRESIZE            = "onresize";
    case HTML_EVENT_ONSCROLL            = "onscroll";
    case HTML_EVENT_ONSEEKED            = "onseeked";
    case HTML_EVENT_ONSEEKING           = "onseeking";
    case HTML_EVENT_ONSELECT            = "onselect";
    case HTML_EVENT_ONSHOW              = "onshow";
    case HTML_EVENT_ONSORT              = "onsort";
    case HTML_EVENT_ONSTALLED           = "onstalled";
    case HTML_EVENT_ONSUBMIT            = "onsubmit";
    case HTML_EVENT_ONSUSPEND           = "onsuspend";
    case HTML_EVENT_ONTIMEUPDATE        = "ontimeupdate";
    case HTML_EVENT_ONTOGGLE            = "ontoggle";
    case HTML_EVENT_ONVOLUMECHANGE      = "onvolumechange";
    case HTML_EVENT_ONWAITING           = "onwaiting";
}
