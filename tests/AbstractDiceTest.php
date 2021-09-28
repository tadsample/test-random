<?php

declare(strict_types=1);

namespace Tadsample\Random;

use function range;

class AbstractDiceTest extends TestCase
{
    public function test(): void
    {
        $subject = new class extends AbstractDice {
            private $count = 0;

            public function random(int $max): int
            {
                return ($this->count++ % $max) + 1;
            }
        };

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
