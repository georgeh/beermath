<?php


namespace BeerMath\Value;


/**
 * Class Density
 * @package BeerMath\Value
 */
class Density
{

    /**
     * @see http://web2.airmail.net/~/sgross/fermcalc/fermcalc_conversions.html#br
     * @var array
     */
    private static $HACKBARTH_COEFFICIENTS = array(1.0, 0.3875135555, 0.09702881653, 0.3883357480, -1.782845295,
        5.591472292, -11.00667976, 13.62230734, -10.33082001, 4.387787019,
        -0.7995558730);
    /**
     * @var float
     */
    private $gravity;


    /**
     * @param float $gravity
     */
    private function __construct($gravity)
    {
        $this->gravity = $gravity;
    }

    /**
     * @param float $gravity
     * @return Density
     */
    public static function FromGravity($gravity)
    {
        return new self($gravity);
    }

    /**
     * @param $degrees float
     * @return Density
     */
    public static function FromPlato($degrees)
    {
        return new self(self::PlatoToGravity($degrees));
    }

    /**
     * @param $degrees float
     * @return Density
     */
    public static function FromBrix($degrees)
    {
        return new self(self::PlatoToGravity($degrees));
    }

    /**
     * @see http://web2.airmail.net/~/sgross/fermcalc/fermcalc_conversions.html#br
     * @see http://futureboy.us/fsp/colorize.fsp?f=Brix.frink
     * @param float $degrees
     * @return float
     */
    private static function PlatoToGravity($degrees)
    {
        $sg = 1.0;
        $bp = $degrees / 100;
        for ($k = 1; $k <= 10; $k++) {
            $coefficient = self::$HACKBARTH_COEFFICIENTS[$k];
            $sg = $sg + ($coefficient * pow($bp, $k));
        }
        return $sg;

    }

    /**
     * @return float
     */
    public function gravity()
    {
        return $this->gravity;
    }

    /**
     * @see https://en.wikipedia.org/wiki/Brix#Tables
     * @return float
     */
    public function plato()
    {
        return (((182.4601 * $this->gravity - 775.6821) * $this->gravity + 1262.7794) * $this->gravity -669.5622);
    }
}