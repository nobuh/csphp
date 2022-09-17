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
 * 基数はインスタンス生成時の設定に従うが、
 * 左端の 0 パディングなどは行われないため
 * ２進数の場合は常に1から始まる
 * 
 * $bin1->and(BigBinary $bin2)
 * 
 * $bin1 と $bin2 は両方とも BigBinary のインスタンスということに
 * $bin1 と $bin2 の and 演算を行って結果を $bin1 に書き込む
 * 
 * or と xor も同様
 * 
 * bitlength() は、最上位ビット（最左端のビット）の位置を返す
 * 何も無かったら 0
 * 最右端が1
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

    public function testAnd(): void
    {
        $x = new BigBinary("1110", 2);
        $y = new BigBinary("5");
        $this->assertSame("100", $x->and($y)->print());

        $x = new BigBinary('73786976294838206460'); // 64 bit max * 4   = 1..100 
        $y = new BigBinary('73786976294838206461'); // 64 bit max *4 +1 = 1..101  
        $this->assertSame("73786976294838206460", $x->and($y)->print());
    }

    public function testOr(): void
    {
        $x = new BigBinary('73786976294838206460'); // 64 bit max * 4   = 1..100 
        $y = new BigBinary('73786976294838206461'); // 64 bit max *4 +1 = 1..101  
        $this->assertSame("73786976294838206461", $x->or($y)->print());
    }

    public function testXor(): void
    {
        $x = new BigBinary('73786976294838206460'); // 64 bit max * 4   = 1..100 
        $y = new BigBinary('73786976294838206461'); // 64 bit max *4 +1 = 1..101  
        $this->assertSame("1", $x->xor($y)->print());
    }

    public function testBitLength(): void
    {
        $x = new BigBinary("10001000", 2);
        $this->assertSame(8, $x->bitLength());
        $x = new BigBinary("0xFFFF", 16);
        $this->assertSame(16, $x->bitLength());
        $x = new BigBinary("0x00", 16);
        $this->assertSame(0, $x->bitLength());
    }
}
