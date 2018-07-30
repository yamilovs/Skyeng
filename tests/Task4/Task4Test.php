<?php

declare(strict_types=1);

namespace Yamilovs\Skyeng\Tests\Task4;

use PHPUnit\Framework\TestCase;
use Yamilovs\Skyeng\Task4\Task4;

class Task4Test extends TestCase
{
    public function testPositiveIntegers(): void
    {
        $task = new Task4();
        $data = [
            ['1111111111111111111111111','2222222222222222222222222123','2223333333333333333333333234'],
            ['6666666666666666666666666','999999999999999999999999999','1006666666666666666666666665'],
            ['70002','56789','126791'],
            ['000', '00000', '0'],
        ];

        foreach ($data as $item) {
            $this->assertEquals($item[2], $task->sum($item[0], $item[1]));
        }
    }

    public function testNegativeIntegers(): void
    {
        $task = new Task4();
        $data = [
            ['-1111111111111111111111111','-2222222222222222222222222123','-2223333333333333333333333234'],
            ['-6666666666666666666666666','-999999999999999999999999999','-1006666666666666666666666665'],
            ['-0', '-000', '0'],
        ];

        foreach ($data as $item) {
            $this->assertEquals($item[2], $task->sum($item[0], $item[1]));
        }
    }

    public function testNegativeWithPositiveIntegers(): void
    {
        $task = new Task4();
        $data = [
            ['-1111111111111111111111111','2222222222222222222222222','1111111111111111111111111'],
            ['6666666666666666666666666','-999999999999999999999999999','-993333333333333333333333333'],
            ['70002', '-56789', '13213'],
            ['-000', '0', '0'],
            ['-0', '000', '0'],
        ];

        foreach ($data as $item) {
            $this->assertEquals($item[2], $task->sum($item[0], $item[1]));
        }
    }

    public function testValuesGreaterThatMaxFloat(): void
    {
        $task = new Task4();

        $data = [
            [str_repeat('1', 400), '-'.str_repeat('2', 399), str_repeat('8', 398).'9'],
        ];

        foreach ($data as $item) {
            $this->assertEquals($item[2], $task->sum($item[0], $item[1]));
        }
    }
}