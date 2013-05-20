<?php

namespace BeerMath;

/**
 * Utilities for working with gravity
 *
 * @package BeerMath
 */
class Gravity {
    /**
     * Convert specific gravity to degrees Plato
     *
     * @see http://morebeer.com/brewingtechniques/library/backissues/issue1.3/manning.html
     * @param float $gravity specific gravity
     * @return float degrees Plato
     */
    public function convertGravityToPlato($gravity)
    {
        return (-676.67 + (1286.4 * $gravity) - (800.47 * pow($gravity, 2)) + (190.74 * pow($gravity, 3)));
    }

    /**
     * Convert degrees Plato to specific gravity
     *
     * @see http://morebeer.com/brewingtechniques/library/backissues/issue1.3/manning.html
     * @param float $plato degrees Plato
     * @return float
     */
    public function convertPlatoToGravity($plato)
    {
        return (259 / (259 - $plato));
    }
}