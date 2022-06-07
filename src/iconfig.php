<?php

namespace ITEC\DAW\INTERFAZ;

interface iconfig
{
    public function addVars(string $attribute, $valor);
    public function removeVars(string $attribute);
    public function modifyVars(string $attribute, $valor);
    public function readVar(string $attribute): string;
}
