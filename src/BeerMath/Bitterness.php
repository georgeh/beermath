<?php

namespace BeerMath;

/**
 * Methods for calculating bitterness of a beer
 * 
 * @package BeerMath
 */
class Bitterness {





    /**
     * Calculate the estimated IBU using the Daniels formula
     *
     * @see
     * @param float $aa      Alpha Acid % of hops (e.g. 5.5)
     * @param float $weight  weight of hop addition in grams (e.g. 25)
     * @param float $volume  volume of finished beer in liters (e.g 19)
     * @param float $gravity average gravity of the wort during the boil (e.g. 1.056)
     * @param int   $time    boil time for the hop addition in minutes (e.g. 60)
     * @return float
     */
    public function daniels($aa, $weight, $volume, $gravity, $time)
    {
        return ($weight * ($aa / 100)) / $volume;
    }
}