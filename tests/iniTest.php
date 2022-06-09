<?php

use ITEC\DAW\INTERFAZ\ini;
use PHPUnit\Framework\TestCase;

final class iniTest extends TestCase{

    public function testcreateINI(){
        $newini0 = ini::createINI("prueba0.ini", 'UsarProxy=1', true);
        $this->assertTrue(file_exists("prueba0.ini"));
    }

    public function testaddVars(){
        $newini1 = ini::createINI("prueba1.ini", 'UsarProxy=1', true);
        $newini1->addVars("palabra","randow");
        $this->assertEquals($newini1->readFile(),"UsarProxy=1\npalabra=randow\n");
    }

    public function testremoveVars(){
        $newini2 = ini::createINI("prueba2.ini", 'UsarProxy=1', true);
        $newini2->addVars("palabra","randow");
        $newini2->removeVars("UsarProxy");
        $this->assertEquals($newini2->readFile(),"palabra=randow\n");
    }

    public function testmodifyVars(){
        $newini3 = ini::createINI("prueba3.ini", 'UsarProxy=1', true);
        $newini3->addVars("palabra","randow");
        $newini3->modifyVars("UsarProxy","4");
        $this->assertEquals($newini3->readFile(),"UsarProxy=4\npalabra=randow\n");
    }
    
    public function testreadVar(){
        $newini4 = ini::createINI("prueba3.ini", 'UsarProxy=1', true);
        $this->assertEquals($newini4->readVar("UsarProxy"),"1");
    }
}