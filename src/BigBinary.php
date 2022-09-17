<?php declare(strict_types=1);
require 'vendor/autoload.php';

class BigBinary
{
    public string $data;
    public int $base;

    function __construct(string $n, int $b = 10)
    {
        $this->data = $n;
        $this->base = $b;
    }

    public function shiftLeft(int $i): BigBinary
    {
        $gmp = gmp_init($this->data, $this->base);
        $this->data = gmp_strval(gmp_mul($gmp, gmp_pow(2, $i)), $this->base);
        return $this;
    }

    public function shiftRight(int $i): BigBinary
    {
        $gmp = gmp_init($this->data, $this->base);  
        $this->data = gmp_strval(gmp_div_q($gmp, gmp_pow(2, $i)), $this->base);
        return $this;
    }

    public function print(): string
    {
        return $this->data;
    }

    public function and(BigBinary $bb): BigBinary
    {
        $gmp1 = gmp_init($this->data, $this->base);
        $gmp2 = gmp_init($bb->data, $bb->base);
        $this->data = gmp_strval(gmp_and($gmp1, $gmp2), $this->base);
        return $this;
    }

    public function or(BigBinary $bb): BigBinary
    {
        $gmp1 = gmp_init($this->data, $this->base);
        $gmp2 = gmp_init($bb->data, $bb->base);
        $this->data = gmp_strval(gmp_or($gmp1, $gmp2), $this->base);
        return $this;
    }

    public function xor(BigBinary $bb): BigBinary
    {
        $gmp1 = gmp_init($this->data, $this->base);
        $gmp2 = gmp_init($bb->data, $bb->base);
        $this->data = gmp_strval(gmp_xor($gmp1, $gmp2), $this->base);
        return $this;
    }

    public function bitLength(): int
    {
        $gmp = gmp_init($this->data, $this->base);
        $start = gmp_scan1($gmp, 0);
        if ($start === -1) {
            return 0;
        }
        $prev = $start;
        while (1) {
            $next = gmp_scan1($gmp, $prev + 1);
            if ($next === -1) {
                return $prev + 1;
            } 
            $prev = $next;
        }
    }
}
