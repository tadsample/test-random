<?php

declare(strict_types=1);

namespace Tadsample\Random;

use function range;

class RandomizerDiceTest extends TestCase
{
    public function test(): void
    {
        $randomizer = new class implements RandomizerInterface {
            private $count = 0;

            public function randomInt(int $min, int $max): int
            {
                return (($this->count++ + $min - 1) % $max) + 1;
            }
        };

        $subject = new RandomizerDice($randomizer);

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
