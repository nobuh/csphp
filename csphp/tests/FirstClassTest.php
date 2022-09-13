<?php declare(strict_types=1);
require dirname(__DIR__) . '/src/FirstClass.php';

class FirstClassTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd(): void
    {
        $f = new FirstClass();
        $this->assertSame(0, $f->add(1, -1));
        $this->assertSame(4, $f->add(5, -1));
    }
}
