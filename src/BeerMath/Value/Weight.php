<?php


namespace BeerMath\Value;


/**
 * Class Weight
 * @package BeerMath\Value
 */
class Weight
{
    const GRAMS_PER_OUNCES   = 28.3495;
    const GRAMS_PER_POUND    = 453.592;
    const GRAMS_PER_KILOGRAM = 1000;
    /**
     * @var float
     */
    private $grams;

    /**
     * @param $grams float
     */
    private function __construct($grams)
    {
        $this->grams = $grams;
    }

    /**
     * @param $grams
     * @return Weight
     */
    public static function FromGrams($grams)
    {
        return new self($grams);
    }

    /**
     * @param $ounces
     * @return Weight
     */
    public static function FromOunces($ounces)
    {
        return new self(self::GRAMS_PER_OUNCES * $ounces);
    }

    /**
     * @param $pounds
     * @return Weight
     */
    public static function FromPounds($pounds)
    {
        return new self(self::GRAMS_PER_POUND * $pounds);
    }

    /**
     * @param $kilograms
     * @return Weight
     */
    public static function FromKilograms($kilograms)
    {
        return new self(self::GRAMS_PER_KILOGRAM * $kilograms);
    }

    /**
     * @return float
     */
    public function grams()
    {
        return $this->grams;
    }

    /**
     * @return float
     */
    public function ounces()
    {
        return ($this->grams / self::GRAMS_PER_OUNCES);
    }

    /**
     * @return float
     */
    public function kilograms()
    {
        return ($this->grams / self::GRAMS_PER_KILOGRAM);
    }

    /**
     * @return float
     */
    public function pounds()
    {
        return ($this->grams * (1 / self::GRAMS_PER_POUND));
    }

}