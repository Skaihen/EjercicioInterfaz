<?php

use ITEC\DAW\INTERFAZ\json;
use PHPUnit\Framework\TestCase;

final class jsonTest extends TestCase
{
    public function testcreateJSON(){
        $newjson0 = json::createJSON("prueba0.json", '{"hola": "mundo"}', true);
        $this->assertTrue(file_exists("prueba0.json"));
    }

    public function testaddVars(){
        $newjson1 = json::createJSON("prueba1.json", '{"hola": "mundo"}', true);
        $newjson1->addVars("palabra","patata");
        $this->assertEquals($newjson1->readFile(),'{"hola":"mundo","palabra":"patata"}');
    }

    public function testremoveVars(){
        $newjson2 = json::createJSON("prueba2.json", '{"hola": "mundo"}', true);
        $newjson2->addVars("palabra", "patata");
        $newjson2->removeVars("hola");
        $this->assertEquals($newjson2->readFile(),'{"palabra":"patata"}');
    }

    public function testmodifyVars(){
        $newjson3 = json::createJSON("prueba3.json", '{"hola": "mundo"}', true);
        $newjson3->modifyVars("hola","patata");
        $this->assertEquals($newjson3->readFile(),'{"hola":"patata"}');
    }

    public function testreadVar(){
        $newjson4 = json::createJSON("prueba4.json", '{"hola": "mundo"}', true);
        $this->assertEquals($newjson4->readVar("hola"),"mundo");

    }
}