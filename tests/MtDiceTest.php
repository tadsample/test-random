<?php

declare(strict_types=1);

namespace Tadsample\Random;

use function mt_srand;

class MtDiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function test(): void
    {
        mt_srand(1);

        $subject = new MtDice();

        $expected = [
            [6],
            [40, 25, 69, 64, 14, 92, 42, 60, 33, 49],
            [4, 5, 6, 2, 1, 1, 4, 3, 5, 1],
        ];

        $actual = [
            $subject->roll('1d10'),
            $subject->roll('10d100'),
            $subject->roll('10d6'),
        ];

        $this->assertSame($expected, $actual);

    }
}
