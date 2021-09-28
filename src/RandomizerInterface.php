<?php

declare(strict_types=1);

namespace Tadsample\Random;

interface RandomizerInterface
{
    public function randomInt(int $min, int $max): int;
}
