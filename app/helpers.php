<?php

if (!function_exists('choose')) {
    function choose(mixed $a, mixed $b = null, float $w = 0.5)
    {
        return $w * mt_getrandmax() > mt_rand() ? $a : $b;
    }
}
