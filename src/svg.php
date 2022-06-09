<?php

namespace ITEC\DAW\INTERFAZ;

use Exception;

class svg extends genericFile implements iconfig
{
    private array $dotsvg;

    public function __construct(string $fileName, string $content, bool $borrarFinal)
    {
        parent::__construct($fileName, $content, $borrarFinal);
        try {
            $this->dotsvg = json_decode($content, true);
        } catch (Exception $exception) {
            printf('Unable to parse the SVG string: %s', $exception->getMessage());
        }
    }

    public static function createSVG(string $fileName, string $content, bool $borrarFinal)
    {
        return new svg($fileName, $content, $borrarFinal);
    }

    public function addVars($attribute, $value)
    {
        $this->dotjson[$attribute] = $value;
        $this->writeFile(json_encode($this->dotjson));
    }

    public function removeVars(string $attribute)
    {
        unset($this->dotjson[$attribute]);
        $this->writeFile(json_encode($this->dotjson));
    }

    public function modifyVars(string $attribute, $value)
    {
        $this->dotjson[$attribute] = $value;
        $this->writeFile(json_encode($this->dotjson));
    }

    public function readVar(string $attribute): string
    {
        return $this->dotjson[$attribute];
    }
}
