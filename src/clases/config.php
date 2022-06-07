<?php

namespace configfile;

interface config
{
    public function addVars($name, $value): bool;
    public function removeVars(string $name): bool;
    public function modifyVars(string $name, $value): bool;
    public function readVars(string $name): string;
}
