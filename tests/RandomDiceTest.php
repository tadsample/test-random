<?php

declare(strict_types=1);

namespace Tadsample\Random;

class RandomDiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function test(): void
    {
        function random_int(int $min, int $max): int
        {
            static $count = 0;

            return (($count++ + $min - 1) % $max) + 1;
        }

        $subject = new RandomDice();

        $expected = [
            [1],
            range(2, 11),
            [6, ...range(1, 6), ...range(1, 3)],
        ];

        $actual = [
            $subject->roll('1d10'),
            $subject->roll('10d100'),
            $subject->roll('10d6'),
        ];

        $this->assertSame($expected, $actual);

    }
}
