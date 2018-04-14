<?php
declare(strict_types=1);
/**
 * Fusion Dependency Injector.
 * A PSR-11 compliant dependency injector.
 *
 * @license <https://github.com/ularanigu/fusion/blob/master/LICENSE>.
 * @link    <https://github.com/ularanigu/fusion>.
 */

function (array $array): int
{
    return intval(getArrayMaxDepth($array));
}

/** @link https://stackoverflow.com/a/19036761/9524661 {{ **/
/*** IN mixed (any value),OUT (string)maxDepth ***/
/*** Retorna la profundidad maxima de un array ***/
function getArrayMaxDepth($input)
{
    if (!canVarLoop($input)) {
        return "0";
    }
    $arrayiter = new RecursiveArrayIterator($input);
    $iteriter = new RecursiveIteratorIterator($arrayiter);
    foreach ($iteriter as $value) {
        //getDepth() start is 0, I use 0 for not iterable values
        $d = $iteriter->getDepth() + 1;
        $result[] = "$d";
    }
    return max($result);
}

/*** IN mixed (any value),OUT (bool)true/false, CHECK if can be used by foreach ***/
/*** Revisa si puede ser iterado con foreach ***/
function canVarLoop($input)
{
    return (is_array($input) || $input instanceof Traversable) ? true : false;
}
/** }} */
