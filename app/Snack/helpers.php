<?php

/**
 * Used by Controller that manage Polymorphic models (as Address or Contacts) when face 'index' and 'store' methods.
 * This two routes has the form as '<type>/<id>/model'. So, this method helps to determine the class name of the model
 * by the <type> passed in the url.
 *
 * @param string $type
 * @return string string
 */
function classByString(string $type)
{
    return 'App\\' . ucfirst($type);
}

/**
 * Used By Filter class. It gets underscore code style and converts it to camelCase.
 *
 * @param string $value
 *
 * @return string string
 */
function underscoreToCamelCase(string $value)
{
    if (strpos($value, '_') === false) {
        return $value;
    }

    $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $value)));
    $str[0] = strtolower($str[0]);

    return $str;
}
