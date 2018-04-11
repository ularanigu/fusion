<?php
declare(strict_types=1);
/**
 * Fusion Dependency Injector.
 * A PSR-11 compliant dependency injector.
 *
 * @license <https://github.com/ularanigu/fusion/blob/master/LICENSE>.
 * @link    <https://github.com/ularanigu/fusion>.
 */

namespace Ularanigu\Fusion;

/**
 * KeyHolder.
 */
class KeyHolder extends Keys
{
  
    /** @var array[] $keys The list of identifiers. */
    protected static $keys = [];
  
    /**
     * Checks to see if the identifier exists.
     * This function should not be visible unless extended.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool Returns true if identifier exists and false if not.
     */
    protected static function exists(string $id): bool
    {
        if (\array_key_exists($id, self::Keys)) {
            return \true;
        }
        return \false;
    }
}
