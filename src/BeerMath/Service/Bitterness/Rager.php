<?php


namespace BeerMath\Service\Bitterness;

use BeerMath\Value\Density;
use BeerMath\Value\Volume;
use BeerMath\Value\Weight;

/**
 * Class Rager
 * @package BeerMath\Service\Bitterness
 *
 * Estimate IBUs using the Rager formula
 * @see http://realbeer.com/hops/FAQ.html#units
 */
class Rager
{

    /**
     * Calculate the estimated IBU using the Rager formula
     *
     * @param float $aa Alpha Acid % of hops (e.g. 5.5)
     * @param Weight $weight weight of hop addition
     * @param Volume $volume volume of finished beer
     * @param Density $gravity average gravity of the wort during the boil
     * @param \DateInterval $time boil time for the hop addition in minutes (e.g. 60)
     * @return float
     */
    public function rager($aa, Weight $weight, Volume $volume, Density $gravity, \DateInterval $time)
    {
        $utilization   = $this->calcUtilizationFactor($time);
        $gravityAdjust = $this->calcGravityAdjustment($gravity);
        return ($weight->grams() * $utilization * $aa / 10) / ($volume->liters() * (1 + $gravityAdjust));
    }

    /**
     * Rager actually used a lookup table, this formula matches the table's data
     * @param \DateInterval $time
     * @return float
     */
    private function calcUtilizationFactor(\DateInterval $time)
    {
        $utilization = 18.11 + (13.86 * tanh(($time->format('%i') - 31.32) / 18.27));
        return $utilization;
    }

    /**
     * @param Density $gravity
     * @return float
     */
    private function calcGravityAdjustment(Density $gravity)
    {
        $gravityAdjust = 0.0;
        if ($gravity->gravity() > 1.050) {
            $gravityAdjust = (($gravity->gravity() - 1.050) / 0.2);
            return $gravityAdjust;
        }
        return $gravityAdjust;
    }
} 