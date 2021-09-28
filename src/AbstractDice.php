<?php

declare(strict_types=1);

namespace Tadsample\Random;

use DomainException;
use function assert;
use function filter_var;
use function is_int;
use function preg_match;
use const FILTER_VALIDATE_INT;

abstract class AbstractDice
{
    /**
     * @param positive-int $max
     * @return positive-int
     */
    abstract public function random(int $max): int;

    /**
     * @return list<int>
     */
    public function roll(string $n): array
    {
        [$d, $max] = $this->parse($n);

        $roll = [];

        for ($i = 0; $i < $d; $i++) {
            $roll[] = $this->random($max);
        }

        return $roll;
    }

    /**
     * @return array{0:positive-int,1:positive-int}
     */
    protected function parse(string $n): array
    {
        if (!preg_match('/\A(?<d>[1-9][0-9]*)d(?<max>[1-9][0-9]*)\z/ui', $n, $matches)) {
            throw new DomainException('数は "1d6" の形式で指定すること');
        }

        $d = filter_var($matches['d'], FILTER_VALIDATE_INT);
        $max = filter_var($matches['max'], FILTER_VALIDATE_INT);
        assert(is_int($d) && 0 < $d);
        assert(is_int($max) && 0 < $max);

        return [$d, $max];
    }
}
