<?php


namespace BeerMath\Value;

/**
 * Represents a temperature
 *
 * @package BeerModels\Value
 */
class Temperature {

    /**
     * @var float
     */
    private $celsius;

    /**
     * Create for a Celsius measurement
     *
     * @param $degrees float Degrees Celsius
     * @return Temperature
     */
    public static function FromCelsius($degrees)
    {
        return new self($degrees);
    }

    /**
     * Create for a Fahrenheit measurement
     *
     * @param $degrees float Degrees Fahrenheit
     * @return Temperature
     */
    public static function FromFahrenheit($degrees)
    {
        $celsius = self::FahrenheitToCelsius($degrees);
        return new self($celsius);
    }

    /**
     * Convert Fahrenheit to Celsius
     *
     * @param $degrees float Degrees Fahrenheit
     * @return float Degrees Celsius
     */
    private static function FahrenheitToCelsius($degrees)
    {
       return (float) ($degrees - 32.0) / 1.8;
    }

    /**
     * @param $celsius float
     */
    private function __construct($celsius)
    {
        $this->celsius = $celsius;
    }

    /**
     * Get the value in degrees Celsius
     *
     * @return float
     */
    public function celsius()
    {
        return $this->celsius;
    }

    /**
     * Get the value in degrees Fahrenheit
     *
     * @return float
     */
    public function fahrenheit()
    {
        return ($this->celsius * 1.8) + 32;
    }
}