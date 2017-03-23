<?php

namespace Lidercap\Core\Util;

/**
 * Classe proxy para "Lidercap\Core\Type\StringType".
 *
 * @method bool   isValid(string $string)
 * @method bool   has(string $string, string $search)
 * @method string match(string $string, string $regex)
 * @method int    length(string $string)
 * @method string trim(string $string)
 * @method string replace(string $string, string $search, string $replace)
 * @method string lowerCase(string $string)
 * @method string upperCase(string $string)
 * @method string capitalize(string $string)
 * @method string firstChar(string $string, string $char)
 * @method string firstCharIsNot(string $string, string $char)
 * @method string lastChar(string $string, string $char)
 * @method string lastCharIsNot(string $string, string $char)
 * @method string truncate(string $string, string $limit, string $append)
 * @method string clear(string $string)
 * @method string explode(string $string, string $sepatator)
 * @method string join(array $array, string $sepatator)
 */
class StringUtil extends AbstractUtil
{

}
