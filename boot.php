<?php
declare(strict_types=1);
/**
 * Fusion Dependency Injector.
 * A PSR-11 compliant dependency injector.
 *
 * @license <https://github.com/ularanigu/fusion/blob/master/LICENSE>.
 * @link    <https://github.com/ularanigu/fusion>.
 */

if (!function_exists('array_depth')) {
function array_depth(array $array): int
{
    return intval(getArrayMaxDepth($array));
}
}

/** @link https://stackoverflow.com/a/19036761/9524661 {{ **/
if (!function_exists('getArrayMaxDepth')) {
function getArrayMaxDepth($input)
{
    if (!canVarLoop($input)) {
        return "0";
    }
    $arrayiter = new RecursiveArrayIterator($input);
    $iteriter = new RecursiveIteratorIterator($arrayiter);
    foreach ($iteriter as $value) {
        $d = $iteriter->getDepth() + 1;
        $result[] = "$d";
    }
    return max($result);
}
}
if (!function_exists('canVarLoop')) {
function canVarLoop($input)
{
    return (is_array($input) || $input instanceof Traversable) ? true : false;
}
}
/** }} */
