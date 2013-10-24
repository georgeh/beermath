<?php


namespace BeerMath\Value;

/**
 * Class Volume
 * @package BeerMath\Value
 */
class Volume
{
    const LITERS_PER_GALLON     = 3.78541178;
    const LITERS_PER_OUNCE      = 0.0295735296;
    const LITERS_PER_MILLILITER = 0.001;

    /**
     * @var float
     */
    private $liters;

    /**
     * @param float $liters
     */
    private function __construct($liters)
    {
        $this->liters = $liters;
    }

    /**
     * @param float $liters
     * @return Volume
     */
    public static function FromLiters($liters)
    {
        return new self($liters);
    }

    /**
     * @param $gallons
     * @return Volume
     */
    public static function FromGallons($gallons)
    {
        return new self($gallons * self::LITERS_PER_GALLON);
    }

    /**
     * @param $ounces
     * @return Volume
     */
    public static function FromOunces($ounces)
    {
        return new self($ounces * self::LITERS_PER_OUNCE);
    }

    /**
     * @param $ml
     * @return Volume
     */
    public static function FromMilliliters($ml)
    {
        return new self($ml * self::LITERS_PER_MILLILITER);
    }

    /**
     * @return float
     */
    public function liters()
    {
        return $this->liters;
    }

    /**
     * @return float
     */
    public function gallons()
    {
        return ($this->liters / self::LITERS_PER_GALLON);
    }

    /**
     * @return float
     */
    public function ounces()
    {
        return ($this->liters / self::LITERS_PER_OUNCE);
    }

    /**
     * @return float
     */
    public function milliliters()
    {
        return ($this->liters / self::LITERS_PER_MILLILITER);
    }
}