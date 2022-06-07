<?php

use ITEC\DAW\POO\fraccion;
use PHPUnit\Framework\TestCase;

final class fraccionTest extends TestCase
{
    public function DP_test_fraccion()
    {
        return [
            "Fraccion 1" => [
                3,
                11,
                3,
                11
            ],
            "Fraccion 2" => [
                9,
                3,
                9,
                3,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_fraccion
     */
    public function test_createFraccion($numEsperado, $denEsperado, $numerador, $denominador)
    {
        $fraccionPrueba = fraccion::createFraccion($numerador, $denominador);
        $this->assertEquals($numEsperado, $fraccionPrueba->getNumerador());
        $this->assertEquals($denEsperado, $fraccionPrueba->getDenominador());
    }

    public function DP_test_suma()
    {
        return [
            "Fraccion 1" => [
                103,
                18,
                2,
                9,
                11,
                2
            ],
            "Fraccion 2" => [
                54,
                24,
                9,
                6,
                3,
                4,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_suma
     */
    public function test_suma($numEsperado, $denEsperado, $numerador1, $denominador1, $numerador2, $denominador2)
    {
        $fraccionPrueba1 = fraccion::createFraccion($numerador1, $denominador1);
        $fraccionPrueba2 = fraccion::createFraccion($numerador2, $denominador2);
        $fracionSuma = $fraccionPrueba1->sumaFraccion($fraccionPrueba2);

        $this->assertEquals($numEsperado, $fracionSuma->getNumerador());
        $this->assertEquals($denEsperado, $fracionSuma->getDenominador());
    }

    public function DP_test_resta()
    {
        return [
            "Fraccion 1" => [
                -95,
                18,
                2,
                9,
                11,
                2
            ],
            "Fraccion 2" => [
                18,
                24,
                9,
                6,
                3,
                4,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_resta
     */
    public function test_resta($numEsperado, $denEsperado, $numerador1, $denominador1, $numerador2, $denominador2)
    {
        $fraccionPrueba1 = fraccion::createFraccion($numerador1, $denominador1);
        $fraccionPrueba2 = fraccion::createFraccion($numerador2, $denominador2);
        $fracionResta = $fraccionPrueba1->restaFraccion($fraccionPrueba2);

        $this->assertEquals($numEsperado, $fracionResta->getNumerador());
        $this->assertEquals($denEsperado, $fracionResta->getDenominador());
    }

    public function DP_test_multiplica()
    {
        return [
            "Fraccion 1" => [
                22,
                18,
                2,
                9,
                11,
                2
            ],
            "Fraccion 2" => [
                27,
                24,
                9,
                6,
                3,
                4,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_multiplica
     */
    public function test_multiplica($numEsperado, $denEsperado, $numerador1, $denominador1, $numerador2, $denominador2)
    {
        $fraccionPrueba1 = fraccion::createFraccion($numerador1, $denominador1);
        $fraccionPrueba2 = fraccion::createFraccion($numerador2, $denominador2);
        $fracionMultiplica = $fraccionPrueba1->multiplicaFraccion($fraccionPrueba2);

        $this->assertEquals($numEsperado, $fracionMultiplica->getNumerador());
        $this->assertEquals($denEsperado, $fracionMultiplica->getDenominador());
    }

    public function DP_test_divide()
    {
        return [
            "Fraccion 1" => [
                4,
                99,
                2,
                9,
                11,
                2
            ],
            "Fraccion 2" => [
                36,
                18,
                9,
                6,
                3,
                4,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_divide
     */
    public function test_divide($numEsperado, $denEsperado, $numerador1, $denominador1, $numerador2, $denominador2)
    {
        $fraccionPrueba1 = fraccion::createFraccion($numerador1, $denominador1);
        $fraccionPrueba2 = fraccion::createFraccion($numerador2, $denominador2);
        $fracionDivide = $fraccionPrueba1->divideFraccion($fraccionPrueba2);

        $this->assertEquals($numEsperado, $fracionDivide->getNumerador());
        $this->assertEquals($denEsperado, $fracionDivide->getDenominador());
    }
}
