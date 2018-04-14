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
 * BuilderInterface.
 */
interface BuilderInterface
{
 
    /**
     * Builder constructor.
     *
     * @param array[] $keysToInject Some keys to inject off the bat.
     *
     * NOTE: If objects are injected through constructors you will not be able to inject parameters in
     * the object you just injected.
     * 
     * @return void Return nothing.
     */
    public function __construct(array $keysToInject = array());
}
