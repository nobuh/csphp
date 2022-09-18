<?php declare(strict_types=1);

namespace Nobuh\Csphp;

class Fibonacci
{
    public function at(int $n): int
    {
        if ($n < 2) {
            return $n;
        } 
        $x = 0;
        $y = 1;
        for ($i = 2; $i <= $n; $i++) {
            $tmp = $x + $y;
            $x = $y;
            $y = $tmp;
        }
        return $y;
    }
}
