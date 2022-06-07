<?php

use ITEC\DAW\POO\banco;
use PHPUnit\Framework\TestCase;

final class bancoTest extends TestCase
{
    public function DP_test_banco()
    {
        return [
            "Banco 1" => [
                [
                    1312 => 432,
                    42123 => 62,
                    "Total" => 1194
                ],
                [
                    1312 => 420,
                    42123 => 69,
                    12341 => 700
                ]
            ]
        ];
    }
    /**
     * @dataProvider DP_test_banco
     */
    public function test_createBanco($esperado, $cuenta)
    {
        $bancoPrueba = banco::createBanco($cuenta);
        $bancoPrueba->ingreso(1312, 12);
        $this->assertEquals($esperado[1312], $bancoPrueba->getSaldo(1312));
        $bancoPrueba->cargo(42123, 7);
        $this->assertEquals($esperado[42123], $bancoPrueba->getSaldo(42123));
        $this->assertEquals($esperado["Total"], $bancoPrueba->getTotalBanco());
    }
}
