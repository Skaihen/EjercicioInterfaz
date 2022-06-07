<?php

use ITEC\DAW\POO\fecha;
use PHPUnit\Framework\TestCase;

final class fechaTest extends TestCase
{
    public function DP_test_fecha()
    {
        return [
            "Fecha correcta" => [
                "3-11-2013",
                3,
                11,
                2013,
            ],
            "Fecha erronea" => [
                "0-13-2013",
                0,
                13,
                2013,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_fecha
     */
    public function test_createFecha($esperado, $dia, $mes, $año)
    {
        $fechaPrueba = fecha::createFecha($dia, $mes, $año);
        $this->assertEquals($esperado, $fechaPrueba->__toString());
    }

    public function DP_test_validarFecha()
    {
        return [
            "Fecha correcta" => [
                true,
                3,
                11,
                2013,
            ],
            "Fecha erronea" => [
                false,
                0,
                13,
                2013,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_validarFecha
     */
    public function test_validarFecha($esperado, $dia, $mes, $año)
    {
        $fechaPrueba = fecha::createFecha($dia, $mes, $año);
        $this->assertEquals($esperado, $fechaPrueba->validarFecha());
    }

    public function DP_test_nextDay()
    {
        return [
            "Fecha correcta" => [
                "4-11-2013",
                3,
                11,
                2013,
            ]
        ];
    }
    /**
     * @dataProvider DP_test_nextDay
     */
    public function test_nextDay($esperado, $dia, $mes, $año)
    {
        $fechaPrueba = fecha::createFecha($dia, $mes, $año);
        $fechaPrueba->nextDay();
        $this->assertEquals($esperado, $fechaPrueba->__toString());
    }
}
