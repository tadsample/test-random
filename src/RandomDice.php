<?php

declare(strict_types=1);

namespace Tadsample\Random;

class RandomDice extends AbstractDice
{
    /**
     * @param positive-int $max
     * @return positive-int
     */
    public function random(int $max): int
    {
        return random_int(1, $max);
    }
}
