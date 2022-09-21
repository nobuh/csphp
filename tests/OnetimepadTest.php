<?php declare(strict_types=1);

use \Nobuh\Csphp\Onetimepad;
use function PHPUnit\Framework\assertSame;

/*
 * Onetimepad.php
 * 
 * encrypt(string)
 * 入力文字列と同じ長さのランダムキーを生成し、XOR で暗号化するメソッド
 * キーはオブジェクト内に格納
 * 
 * decrypt(string)
 * 暗号化文字列を、内部にもったキーで平文に復号する
 */

class OnetimepadTest extends \PHPUnit\Framework\TestCase
{
    public function testEncryptAndDecrypt(): void
    {
        $pad = new Onetimepad();
        $input = "One Time Pad";
        assertSame("One Time Pad", $pad->decrypt($pad->encrypt($input)));
    }
}