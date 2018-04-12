<?php
declare(strict_types=1);
/**
 * Fusion Dependency Injector.
 * A PSR-11 compliant dependency injector.
 *
 * @license <https://github.com/ularanigu/fusion/blob/master/LICENSE>.
 * @link    <https://github.com/ularanigu/fusion>.
 */

use Ularanigu\Fusion\Container;
use PHPUnit\Framework\TestCase;

/**
 * ContainerTest.
 */
class KeyHolderTest extends TestCase
{
  public function testExistsFunction()
  {
    $exampleContainer = new Container();
    $res1 = $exampleContainer->has('testCase1');
    $res2 = $exampleContainer->has('testCase2');
    $res3 = $exampleContainer->has('testCase3');
    $res4 = $exampleContainer->has('testCase4');
    $res5 = $exampleContainer->has('testCase5');
    $this->assertTrue($res1);
    $this->assertTrue($res2);
    $this->assertTrue($res3);
    $this->assertTrue($res4);
    $this->assertTrue($res5);
  }
}
