<?php

if (!function_exists('choose')) {
    /**
     * "Choose" between first and second argument (or "null" if not specified)
     * Third parameter is weight of first to be chosen (between 0 & 1)
     *
     * @param mixed $a
     * @param mixed|null $b
     * @param float $w
     * @return mixed
     */
    function choose(mixed $a, mixed $b = null, float $w = 0.5): mixed
    {
        return $w * mt_getrandmax() > mt_rand() ? $a : $b;
    }
}
