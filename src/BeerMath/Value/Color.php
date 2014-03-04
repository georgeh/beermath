<?php

namespace BeerMath\Value;

/**
 * Class Color
 * @package BeerMath\Value
 */
class Color
{
    const EBC_PER_SRM = 1.97;

    /**
     * @var float
     */
    private $srm;

    /**
     * @param float $srm
     */
    public function __construct($srm)
    {
        $this->srm = $srm;
    }

    /**
     * @param float $ebc
     * @return Color
     */
    public static function FromEBC($ebc)
    {
        return new self($ebc / self::EBC_PER_SRM);
    }

    /**
     * @param $srm
     * @return Color
     */
    public static function FromSRM($srm)
    {
        return new self($srm);
    }

    /**
     * @param $lovibond
     * @return Color
     */
    public static function FromLovibond($lovibond)
    {
        return new self(($lovibond * 1.35) - 0.6);
    }

    /**
     * @return float
     */
    public function srm()
    {
        return $this->srm;
    }

    /**
     * @return float
     */
    public function ebc()
    {
        return $this->srm * self::EBC_PER_SRM;
    }

    /**
     * @return float
     */
    public function lovibond()
    {
        return ($this->srm + 0.6) / 1.35;
    }

} 