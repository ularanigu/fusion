<?php
declare(strict_types=1);
/**
 * Fusion Dependency Injector.
 * A PSR-11 compliant dependency injector.
 *
 * @license <https://github.com/ularanigu/fusion/blob/master/LICENSE>.
 * @link    <https://github.com/ularanigu/fusion>.
 */ 

namespace Ularanigu\Fusion\LazyLoad;

use Ularanigu\Fusion\Exception\LazyLoadException;

/**
 * @class Registery
 */
class Registery
{

    /** @var $instance The instance of the actual class is stored. */
    private $instance = \null;

    /** @var string $className The class name. */
    private $className = \null;

    /**
     * Set the class name.
     *
     * @param string $className The class name.
     *
     * @return void Return nothing.
     */
    public function __construct($className)
    {
        $this->setClassName($className);
    }

    /**
     * Set the class name.
     *
     * @param string $className The class name.
     *
     * @throws LazyLoadException If the class name is empty.
     *
     * @return void Return nothing.
     */
    public function setClassName($className): void
    {
        $className = \trim($className);
        if (!empty($className)) {
            $this->className = $className;
        } else {
            throw new LazyLoadException('The class name is empty.');
        }
    }

    /**
     * Get the class name.
     *
     * @return string Return the class name.
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * Get the instance of the class this LazyLoader is proxying.
     *
     * @return object An instance of the class this LazyLoader is proxying.
     */
    public function getInstance(): object
    {
        if (\null === $this->instance) {
            $this->instance = new $this->className();
        }
        return $this->instance;
    }

    /**
     * Call the call magic method.
     *
     * @param string $name      The method name.
     * @param array  $arguments The method arguments.
     *
     * @return mixed The requested method would normally return.
     */
    public function __call(string $name, array $arguments)
    {
        $instance = $this->getInstance();
        return \call_user_func_array(
            array($instance, $name),
            $arguments
        );
    }

    /**
     * Call the get magic method.
     *
     * @param string $name The property name.
     *
     * @return mixed The property value.
     */
    public function __get(string $name)
    {
        return $this->getInstance()->$name;
    }

    /**
     * Call the set magic method.
     *
     * @param string $name  The property name.
     * @param mixed  $value The property value.
     *
     * @return void Return nothing.
     */
    public function __set(string $name, $value): void
    {
        $this->getInstance()->$name = $value;
    }

    /**
     * Call the isset magic method.
     *
     * @param string $name The property name.
     *
     * @return bool Return TRUE if is set and FALSE if not.
     */
    public function __isset(string $name): bool
    {
        return (bool) isset($this->getInstance()->$name);
    }

    /**
     * Call the unset magic method.
     *
     * @param string $name The property name.
     *
     * @return void Return nothing.
     */
    public function __unset(string $name): void
    {
        unset($this->getInstance()->$name);
    }
}
