<?php declare(strict_types=1);

use \Nobuh\Csphp\CalculatePi;
use function PHPUnit\Framework\assertSame;

/*
 * CalculatePi
 * 
 * ライプニッツの級数を使って Pi を計算する
 * 
 * Π = 4/1 - 4/3 + 4/5 - 4/7 + 4/9 - 4/11 + ....
 * 
 * CalculatePi クラス
 * in(n) メソッドで、n 項目までの級数で計算する
 * 
 * */

class CalculatePiTest extends \PHPUnit\Framework\TestCase
{
    public function testCalculatePi(): void
    {
        $pi = new CalculatePi();
        assertSame("3.141", sprintf("%1.3f", $pi->in(1000)));
    }
}