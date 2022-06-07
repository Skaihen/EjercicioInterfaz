<?php

use ITEC\DAW\POO\NIF;
use PHPUnit\Framework\TestCase;

final class NIFTest extends TestCase
{
    public function DP_test_NIF()
    {
        return [
            "NIF correcto" => [
                "24311134L",
                24311134,
                "L"
            ],
            "NIF incorrecto" => [
                "Error de creación: DNI o letra incorrectos",
                213498439,
                "F"
            ]
        ];
    }
    /**
     * @dataProvider DP_test_NIF
     */
    public function test_createNIF($esperado, $dni, $letra)
    {
        $NIFPrueba = NIF::createNIF($dni, $letra);
        $this->assertEquals($esperado, $NIFPrueba->getNIF());
    }
}
