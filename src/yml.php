<?php

namespace ITEC\DAW\INTERFAZ;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class yml extends genericFile implements iconfig
{
    private array $dotyml;

    public function __construct(string $fileName, string $content, bool $borrarFinal)
    {
        parent::__construct($fileName, $content, $borrarFinal);
        try {
            $this->dotyml = Yaml::parse($content);
        } catch (ParseException $exception) {
            printf('Unable to parse the YAML string: %s', $exception->getMessage());
        }
    }

    public static function createYML(string $fileName, string $content, bool $borrarFinal)
    {
        return new yml($fileName, $content, $borrarFinal);
    }

    public function addVars($attribute, $value)
    {
        $this->dotyml[$attribute] = $value;
        $this->writeFile(Yaml::dump($this->dotyml));
    }

    public function removeVars(string $attribute)
    {
        unset($this->dotyml[$attribute]);
        $this->writeFile(Yaml::dump($this->dotyml));
    }

    public function modifyVars(string $attribute, $value)
    {
        $this->dotyml[$attribute] = $value;
        $this->writeFile(Yaml::dump($this->dotyml));
    }

    public function readVar(string $attribute): string
    {
        return $this->dotyml[$attribute];
    }
}
