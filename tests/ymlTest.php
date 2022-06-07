<?php

use ITEC\DAW\INTERFAZ\yml;
use PHPUnit\Framework\TestCase;

final class ymlTest extends TestCase
{
    public function testCreateFile()
    {
        $newyml = yml::createYML("prueba.yml", "hola: mundo", true);
        $this->assertTrue(file_exists("prueba.yml"));
    }
}
