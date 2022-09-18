<?php declare(strict_types=1);

use Nobuh\Csphp\Fibonacci;;

/*
 * フィボナッチ数を求める
 *   Fibonacci->at(n) 
 */
class FibonacciTest extends \PHPUnit\Framework\TestCase
{
    public function testAt(): void
    {
        $f = new Fibonacci();
        $this->assertSame(0, $f->at(0));
        $this->assertSame(1, $f->at(1));
        $this->assertSame(1, $f->at(2));
        $this->assertSame(5, $f->at(5));
        $this->assertSame(55, $f->at(10));
    }
}
