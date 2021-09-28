<?php

declare(strict_types=1);

namespace Tadsample\Random;

class GlobalRandomizer implements RandomizerInterface
{
    public function randomInt(int $min, int $max): int
    {
        return random_int($min, $max);
    }
}
