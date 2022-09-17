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
}
