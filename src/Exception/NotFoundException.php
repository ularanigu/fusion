<?php
declare(strict_types=1);
/**
 * Fusion Dependency Injector.
 * A PSR-11 compliant dependency injector.
 *
 * @license <https://github.com/ularanigu/fusion/blob/master/LICENSE>.
 * @link    <https://github.com/ularanigu/fusion>.
 */

namespace Ularanigu\Fusion\Exception;

use Psr\Container\NotFoundExceptionInterface;
use UnexpectedValueException;

/**
 * @link <https://secure.php.net/manual/en/class.unexpectedvalueexception.php>.
 * @link <https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-11-container.md>.
 * 
 * NotFoundException.
 */
class NotFoundException extends UnexpectedValueException implements FusionExceptionInterface, NotFoundExceptionInterface
{
}
