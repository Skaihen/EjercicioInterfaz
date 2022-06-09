<?php

use ITEC\DAW\INTERFAZ\csv;
use PHPUnit\Framework\TestCase;

final class csvTest extends TestCase{

    public function testcreateCSV(){
        $newcsv0 = csv::createCSV("prueba0.csv", "1997,Ford", true);
        $this->assertTrue(file_exists("prueba0.csv"));
    }

    public function testaddVars(){
        $newcsv1 = csv::createCSV("prueba1.csv", "1997,Ford", true);
        $newcsv1->addVars("palabra","patata");
        $this->assertEquals('1997,Ford,patata',$newcsv1->readFile());
    }

    public function testremoveVars(){
        $newcsv2 = csv::createCSV("prueba2.csv", "1997,Ford", true);
        $newcsv2->addVars("palabra","patata");
        $newcsv2->removeVars("0");
        $this->assertEquals('Ford,patata',$newcsv2->readFile());
    }

    public function testmodifyVars(){
        $newcsv3 = csv::createCSV("prueba2.csv", "1997,Ford", true);
        $newcsv3->modifyVars("0","2004");
        $this->assertEquals('2004,Ford',$newcsv3->readFile());
    }

    public function testreadVar(){
        $newcsv4 = csv::createCSV("prueba2.csv", "1997,Ford", true);
        $this->assertEquals("1997",$newcsv4->readVar(0));

    }
}