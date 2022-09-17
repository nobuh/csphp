<?php declare(strict_types=1);
require dirname(__DIR__) . '/src/BigBinary.php';

/*
 * BigBinary gmp を使った任意長のバイナリ
 * ビットシフトが存在しないので実装する
 * 
 * $b = new BigBinary("number") で作成する
 * デフォルト10進数
 * 
 * BigBinary("010101", 2) のように指定すれば他の基数も可能
 * 
 * 64 ビット int より大きい数値を扱うため
 * 数値は文字列で与える
 * 
 * shiftLeft(n)
 * shiftRight(n)
 * 
 * また、データの表示は print() で文字列として行う
 */

class BigBinaryTest extends \PHPUnit\Framework\TestCase
{
    public function testShiftleft(): void
    {
        $b = new BigBinary("1");
        $this->assertSame("2", $b->shiftLeft(1)->print());
        $this->assertSame("16", $b->shiftLeft(3)->print());
        $this->assertSame("64", $b->shiftLeft(2)->print());

        $max64 = new BigBinary('18446744073709551615');
        $this->assertSame('73786976294838206460', $max64->shiftLeft(2)->print()); // 64 bit max の４倍    

        $bin = new BigBinary("1111", 2);
        $this->assertSame("1111", $bin->print());
        $this->assertSame("111100", $bin->shiftLeft(2)->print());
    }

    public function testShiftRight(): void
    {
        $b = new BigBinary("100");
        $this->assertSame("50", $b->shiftRight(1)->print());
        $this->assertSame("12", $b->shiftRight(2)->print());
    }
}
