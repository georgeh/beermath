<?php


namespace BeerMath\Service\Bitterness;


use BeerMath\Value\Density;
use BeerMath\Value\Volume;
use BeerMath\Value\Weight;

class Tinseth
{
    /**
     * Calculate the estimated IBU using the Tinseth formula
     *
     * @see http://realbeer.com/hops/research.html
     * @param float $aa           Alpha Acid % of hops (e.g. 5.5)
     * @param Weight $weight      weight of hop addition
     * @param Volume $volume      volume of finished beer
     * @param Density $gravity    average gravity of the wort during the boil
     * @param \DateInterval $time boil time for the hop addition
     * @return float
     */
    public function tinseth($aa, Weight $weight, Volume $volume, Density $gravity, \DateInterval $time)
    {
        $mgAlphaPerLiter = ((($aa / 100) * $weight->grams() * 1000) / $volume->liters());
        $bignessFactor   = (1.65 * pow(0.000125, ($gravity->gravity() - 1)));
        $boilTimeFactor  = ((1 - exp(-0.04 * floatval($time->format('%i')))) / 4.15);
        return ($mgAlphaPerLiter * $bignessFactor * $boilTimeFactor);
    }
}