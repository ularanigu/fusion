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

use ArrayAccess;

/**
 * @link <https://secure.php.net/manual/en/class.arrayaccess.php>.
 *
 * Builder.
 */
class Builder extends KeyHolder implements BuilderInterface, ArrayAccess
{
    
    /** @var array[] $keys The list of local keys. */
    private $localKeys = array();

    /**
     * Builder constructor.
     *
     * @param array $keysToInject Some keys to inject off the bat.
     *
     * NOTE: If objects are injected through constructors you will not be able to inject parameters in
     * the object you just injected.
     * 
     * @return void Return nothing.
     */
    public function __construct(array $keysToInject = array())
    {
        if (!empty($keysToInject)) {
            if (\array_depth($keysToInject) >= 1) {
                throw new InvalidArrayDepthException('The array depth is not 1 or higher.');
            }
            self::$localKeys += $keysToInject;
        }
    }
}
