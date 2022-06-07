<?php

namespace configfile;

class file
{
    private string $fileName;
    private $archivo;

    private function __contruct(string $fileName, string $content)
    {
        $this->fileName = $fileName;
        $this->archivo = \fopen($fileName, "a+");
    }

    private function __destruct()
    {
        \fclose($this->archivo);
        unlink($this->fileName);
        unset($this->fileName);
    }

    protected function getFileName()
    {
        return $this->fileName;
    }

    protected function getArchivo()
    {
        return $this->archivo;
    }

    public static function createFile(string $fileName, string $content): bool
    {
        new file($fileName, $content);
        return \file_exists($fileName);
    }

    public function readFile(): string
    {
        return \file_exists($this->fileName) ? file_get_contents($this->fileName) : "El archivo no existe";
    }

    public function removeFile(): bool
    {
        $file = $this->fileName;
        $this->__destruct();
        return !\file_exists($file);
    }
    public function writeFile(string $content)
    {
        \fwrite($this->archivo, $content);
    }
}
