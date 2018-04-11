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

use Psr\Container\ContainerInterface;

/**
 * @link <https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-11-container.md>.
 * 
 * Container.
 */
class Container extends KeyHolder implements ContainerInterface
{

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws Exception\IdentifierNotFoundException If no entry was found.
     * @throws NotFoundExceptionInterface            No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface           Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        if (!self::exists($id)) {
            throw new Exception\IdentifierNotFoundException('The requested id does not exist in the container.');
        }
        return self::get($id);
    }
    
    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id)
    {
        if (!self::exists($id)) {
            return \false;
        }
        return \true;
    }
}
