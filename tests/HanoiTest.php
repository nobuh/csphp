<?php declare(strict_types=1);

use \Nobuh\Csphp\Hanoi;
use function PHPUnit\Framework\assertSame;

/*
 * Hanoi
 * 
 * 任意の枚数のハノイの塔の問題を解く
 * 
 */

class HanoiTest extends \PHPUnit\Framework\TestCase
{
    public function testHanoi(): void
    {
        $towerA = [9];
        $towerB = [];
        $towerC = [];
        Hanoi::solve($towerA, $towerC, $towerB, 1); // スタート、ゴール、テンポラリ、のタワー 
        assertSame([9], $towerC);

        $towerA = [3, 2];
        $towerB = [];
        $towerC = [];
        Hanoi::solve($towerA, $towerC, $towerB, 2); 
        assertSame([3, 2], $towerC);

        $towerA = [3, 2, 1];
        $towerB = [];
        $towerC = [];
        Hanoi::solve($towerA, $towerC, $towerB, 3); 
        assertSame([3, 2, 1], $towerC);

        $towerA = ["A", "B", "C", "D", "E", "F"];
        $towerB = [];
        $towerC = [];
        Hanoi::solve($towerA, $towerC, $towerB, 6); 
        assertSame(["A", "B", "C", "D", "E", "F"], $towerC);
    }
}