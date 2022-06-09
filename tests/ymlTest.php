<?php

use ITEC\DAW\INTERFAZ\yml;
use PHPUnit\Framework\TestCase;

final class ymlTest extends TestCase
{
    public function testCreateFile()
    {
        $newyml0 = yml::createYML("prueba0.yml", "hola: mundo", true);
        $this->assertTrue(file_exists("prueba0.yml"));
    }

    public function testaddVars(){
        $newyml1 = yml::createYML("prueba1.yml", "hola: mundo", true);
        $newyml1->addVars("palabra", "patata");
        $this->assertEquals($newyml1->readFile(),"hola: mundo\npalabra: patata\n");
    }
    
    public function testremoveVars(){
        $newyml2 = yml::createYML("prueba2.yml", "hola: mundo", true);
        $newyml2->addVars("palabra", "patata");
        $newyml2->removeVars("hola");
        $this->assertEquals($newyml2->readFile(),"palabra: patata\n");
    }

    public function testmodifyVars(){
        $newyml3 = yml::createYML("prueba3.yml", "hola: mundo", true);
        $newyml3->addVars("palabra", "patata");
        $newyml3->modifyVars("palabra", "cosa");
        $this->assertEquals($newyml3->readFile(),"hola: mundo\npalabra: cosa\n");
    }

    public function testreadVar(){
        $newyml4 = yml::createYML("prueba3.yml", "hola: mundo", true);
        $newyml4->addVars("palabra", "patata");
        $this->assertEquals($newyml4->readVar("hola"),"mundo");

    }
}