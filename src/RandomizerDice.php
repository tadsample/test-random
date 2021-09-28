<?php

declare(strict_types=1);

namespace Tadsample\Random;

class RandomizerDice extends AbstractDice
{
    /** @var RandomizerInterface */
    private $randomizer;

    public function __construct(RandomizerInterface $randomizer)
    {
        $this->randomizer = $randomizer;
    }

    /**
     * @param positive-int $max
     * @return positive-int
     */
    public function random(int $max): int
    {
        return $this->randomizer->randomInt(1, $max);
    }
}
