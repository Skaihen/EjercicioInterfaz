<?php

namespace ITEC\DAW\INTERFAZ;

class genericFile
{
    private string $fileName;
    private bool $borrarFinal;
    private $archivo;

    public function __construct(string $fileName, string $content, bool $borrarFinal)
    {
        $this->fileName = $fileName;
        $this->content = $content;
        $this->borrarFinal = $borrarFinal;
        $this->archivo = fopen($fileName, "w+");
        $this->writeFile($content);
    }

    public function __destruct()
    {
        fclose($this->archivo);
        if ($this->borrarFinal) {
            unlink($this->fileName);
        }
        unset($this->fileName);
    }

    public static function createFile(string $fileName, string $content, $borrarFinal)
    {
        return new genericFile($fileName, $content, $borrarFinal);
    }

    public function readFile(): string
    {
        return \file_exists($this->fileName) ? file_get_contents($this->fileName) : "El archivo no existe";
    }

    public function writeFile(string $content)
    {
        \fwrite($this->archivo, $content);
    }
}
