<?php

namespace configfile;

class yml extends file implements config{
    private array $dotyml;

    public function __contruct(string $fileName, string $content){
        parent::createFile($fileName, $content);
        $this->readFile();
    }

    public function addVars($name, $value):bool{

    }
    public function removeVars(string $name):bool;
    public function modifyVars(string $name, $value):bool;
    public function readVars(string $name):string;
}