<?php

namespace ITEC\DAW\INTERFAZ;

use JsonException;

class json extends genericFile implements iconfig
{
    private array $dotjson;

    public function __construct(string $fileName, string $content, bool $borrarFinal)
    {
        parent::__construct($fileName, $content, $borrarFinal);
        try {
            $this->dotjson = json_decode($content, true);
        } catch (JsonException $exception) {
            printf('Unable to parse the JSON string: %s', $exception->getMessage());
        }
    }

    public static function createJSON(string $fileName, string $content, bool $borrarFinal)
    {
        return new json($fileName, $content, $borrarFinal);
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
