<?php

declare(strict_types=1);

namespace Tadsample\Random;

use function mt_rand;

class MtDice extends AbstractDice
{
    /**
     * @param positive-int $max
     * @return positive-int
     */
    public function random(int $max): int
    {
        return mt_rand(1, $max);
    }
}
