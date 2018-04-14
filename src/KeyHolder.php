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
class KeyHolder
{
  
    /** @var array[] $keys The list of keys. */
    private static $keys = array();
  
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
        if (\array_key_exists($id, self::$keys)) {
            return \true;
        }
        return \false;
    }
  
    /**
     * Get the entry based on the identifier.
     * This function should not be visible unless extended.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return mixed Entry.
     */
    protected static function fetch(string $id)
    {
        /**
         * No need to check to see if it exists because it has already
         * been checked. No need to recheck. :)
         */
        return self::$keys[$id];
    }
  
    /**
     * Inject the array keys.
     * This function should not be visible unless extended.
     *
     * @param array $someKeysToAdd A list of keys to add.
     *
     * @return void Return nothing.
     */
    protected static function inject(array $someKeysToAdd): void
    {
        self::$keys = $someKeysToAdd;
    }
}
