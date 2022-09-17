<?php declare(strict_types=1);
require 'vendor/autoload.php';

// まだ他のクラスを使ってない
// use Nobuh\Csphp;

class FirstClass
{
	public function add(int $x, int $y): int
	{
		return $x + $y;
	}
}
