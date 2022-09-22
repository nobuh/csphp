<?php declare(strict_types=1);

namespace Nobuh\Csphp;

class CalculatePi
{
    public function in(int $n_terms): float
    {
        $numerator = 4.0;
        $denominator = 1.0;
        $operation = 1.0;
        $pi = 0.0;
        for ($i = 0; $i < $n_terms; $i++) {
            $pi += $operation * ($numerator / $denominator);
            $denominator += 2.0;
            $operation *= -1.0;
        }

        return $pi;
    }
}
