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
        ];

        foreach ($data as $item) {
            $this->assertEquals($item[2], $task->sum($item[0], $item[1]));
        }
    }
}