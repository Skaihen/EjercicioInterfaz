<?php

namespace ITEC\DAW\INTERFAZ;

class genericFile
{
    private string $fileName;
    private bool $borrarFinal;
    private string $content;
    private $archivo;

    public function __construct(string $fileName, string $content, bool $borrarFinal)
    {
        $this->fileName = $fileName;
        $this->content = $content;
        $this->borrarFinal = $borrarFinal;
        \file_put_contents($fileName, $content);
    }

    public function __destruct()
    {
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
        file_put_contents($this->fileName, $content);
    }
}
