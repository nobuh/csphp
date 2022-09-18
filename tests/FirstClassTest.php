<?php declare(strict_types=1);

use Nobuh\Csphp\FirstClass;

/* 
 * 環境設定とテストの確認のための最初のクラス
 */

class FirstClassTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd(): void
    {
        $f = new FirstClass();
        $this->assertSame(0, $f->add(1, -1));
        $this->assertSame(4, $f->add(5, -1));
    }
}
