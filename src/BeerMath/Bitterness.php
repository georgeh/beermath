<?php

namespace BeerMath;

/**
 * Methods for calculating bitterness of a beer
 * 
 * @package BeerMath
 */
class Bitterness {

    /**
     * Calculate the estimated IBU using the Tinseth formula
     *
     * @see http://realbeer.com/hops/research.html
     * @param float $aa      Alpha Acid % of hops (e.g. 5.5)
     * @param float $weight  weight of hop addition in grams (e.g. 25)
     * @param float $volume  volume of finished beer in liters (e.g 19)
     * @param float $gravity average gravity of the wort during the boil (e.g. 1.056)
     * @param int   $time    boil time for the hop addition in minutes (e.g. 60)
     * @return float
     */
    public function tinseth($aa, $weight, $volume, $gravity, $time)
    {
        $mgAlphaPerLiter = ((($aa / 100) * $weight * 1000) / $volume);
        $bignessFactor   = (1.65 * pow(0.000125, ($gravity - 1)));
        $boilTimeFactor  =  ((1 - exp(-0.04 * $time)) / 4.15);
        return ($mgAlphaPerLiter * $bignessFactor * $boilTimeFactor);
    }

    /**
     * Calculate the estimated IBU using the Rager formula
     *
     * @see http://realbeer.com/hops/FAQ.html#units
     * @param float $aa      Alpha Acid % of hops (e.g. 5.5)
     * @param float $weight  weight of hop addition in grams (e.g. 25)
     * @param float $volume  volume of finished beer in liters (e.g 19)
     * @param float $gravity average gravity of the wort during the boil (e.g. 1.056)
     * @param int   $time    boil time for the hop addition in minutes (e.g. 60)
     * @return float
     */
    public function rager($aa, $weight, $volume, $gravity, $time)
    {
        $utilization = 18.11 + (13.86 * tanh(($time - 31.32) / 18.27));
        $gravityAdjust = 0;
        if ($gravity > 1.050) {
            $gravityAdjust = (($gravity - 1.050) / 0.2);
        }
        return ($weight * $utilization * ($aa / 100) * 1000) / ($volume * (1 + $gravityAdjust));
    }


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