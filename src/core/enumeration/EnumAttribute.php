<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Enumeration;

/**
 * @author Jefferson Silva Santos
 */
enum EnumAttribute: string
{
    case GLOBAL_ATT_ID              = "id";
    case GLOBAL_ATT_ACCESSKEY       = "accesskey";
    case GLOBAL_ATT_AUTOCAPITALIZE  = "autocapitalize";
    case GLOBAL_ATT_AUTOFOCUS       = "autofocus";
    case GLOBAL_ATT_CLASS           = "class";
    case GLOBAL_ATT_CONTENTEDITABLE = "contenteditable";
    case GLOBAL_ATT_DATA            = "data";
    case GLOBAL_ATT_DIR             = "dir";
    case GLOBAL_ATT_DRAGGABLE       = "draggable";
    case GLOBAL_ATT_ENTERKEYHINT    = "enterkeyhint";
    case GLOBAL_ATT_EXPORTPARTS     = "exportparts";
    case GLOBAL_ATT_HIDDEN          = "hidden";
    case GLOBAL_ATT_INERT           = "inert";
    case GLOBAL_ATT_INPUTMODE       = "inputmode";
    case GLOBAL_ATT_IS              = "is";
    case GLOBAL_ATT_ITEMID          = "itemid";
    case GLOBAL_ATT_ITEMPROP        = "itemprop";
    case GLOBAL_ATT_ITEMREF         = "itemref";
    case GLOBAL_ATT_ITEMSCOPE       = "itemscope";
    case GLOBAL_ATT_ITEMTYPE        = "itemtype";
    case GLOBAL_ATT_LANG            = "lang";
    case GLOBAL_ATT_NONCE           = "nonce";
    case GLOBAL_ATT_PART            = "part";
    case GLOBAL_ATT_EXPERIMENTAL    = "Experimental";
    case GLOBAL_ATT_SLOT            = "slot";
    case GLOBAL_ATT_SPELLCHECK      = "spellcheck";
    case GLOBAL_ATT_STYLE           = "style";
    case GLOBAL_ATT_TABINDEX        = "tabindex";
    case GLOBAL_ATT_TITLE           = "title";
    case GLOBAL_ATT_TRANSLATE       = "translate";
    case ATT_ACCEPT                 = "accept";
    case ATT_AUTOCOMPLETE           = "autocomplete";
    case ATT_CAPTURE                = "capture";
    case ATT_CROSSORIGIN            = "crossorigin";
    case ATT_DISABLED               = "disabled";
    case ATT_ELEMENTTIMING          = "elementtiming";
    case ATT_FOR                    = "for";
    case ATT_MAX                    = "max";
    case ATT_MAXLENGTH              = "maxlength";
    case ATT_MIN                    = "min";
    case ATT_MINLENGTH              = "minlength";
    case ATT_MULTIPLE               = "multiple";
    case ATT_PATTERN                = "pattern";
    case ATT_READONLY               = "readonly";
    case ATT_REL                    = "rel";
    case ATT_REQUIRED               = "required";
    case ATT_PLACEHOLDER            = "placeholder";
    case ATT_SIZE                   = "size";
    case ATT_STEP                   = "step";
    case ATT_NAME                   = "name";
    case ATT_TYPE                   = "type";
    case ATT_DIRNAME                = "dirname";
    case ATT_LIST                   = "list";
    case ATT_VALUE                  = "value";
}
