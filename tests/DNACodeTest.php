<?php declare(strict_types=1);

use Nobuh\Csphp\BigBinary;
use Nobuh\Csphp\DNACode;

use function PHPUnit\Framework\assertSame;

/*
 * DNACode.php
 * 
 * DNA の AGCT の 4 種類のコードを格納した文字列を、
 * 2ビットのパターンでバイナリに圧縮し、
 * 任意長のバイナリで格納する
 * 
 * compress(string) メソッドで圧縮して格納
 * 
 * decompress() メソッドで解凍して文字列で返す
 * 
 * dump(base) メソッドで格納されたバイナリをそのまま印字する
 */

class DNACodeTest extends \PHPUnit\Framework\TestCase
{
    public function testCompress(): void
    {
        $dna = new DNACode();
        $dna->compress("ACxGT");
        assertSame("100011011", $dna->dump());
    }

    public function testDecompress(): void
    {
        $dna = new DNACode();

        $dna->compress("ACxGT");
        assertSame("ACGT", $dna->decompress());

        $str = str_repeat("atgacggacaaattgacctcccttcgtcagtacacatgcaatgcacaccgtagtggccga", 100); 
        $dna->compress($str);
        assertSame(strtoupper($str), $dna->decompress());
    }

    public function testDump(): void
    {
        $dna = new DNACode();

        // compress 経由せず直接格納する
        $dna->data = new BigBinary("111", 2);

        assertSame("111", $dna->dump());
    }
}