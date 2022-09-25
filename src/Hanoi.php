<?php declare(strict_types=1);

namespace Nobuh\Csphp;

class Hanoi
{

    public static function solve(array &$begin, array &$end, array &$temp, int $ndisc): void
    {
        if ($ndisc === 1) {
            $end[] = array_pop($begin);
        } else {
            // 底の１枚より上を、end タワーを中間にして、temp タワーに移す
            Hanoi::solve($begin, $temp, $end, $ndisc - 1);
            // 底の１枚を begin タワーから end タワーに移す。
            // １枚移動なので temp タワーは使われない
            Hanoi::solve($begin, $end, $temp, 1);
            // 底の１枚より上を begin タワーを中間に使って、temp タワーから end タワーに移す
            Hanoi::solve($temp, $end, $begin, $ndisc - 1);
        }   
    }
}
