<?php
namespace bem;

class Element
{
    use ConfigParser;

    private $_name;
    public $mods = [];
    public $styles = [];
    public $media = [];
    private $blockName;

    public function __construct(string $name, array $config, string $blockName)
    {
        $this->_name = $name;
        $this->blockName = $blockName;
        $this->parseConfig($config, $this->blockName, $this->_name);
    }

    public function __toString()
    {
        $styleRules = '';
        foreach ($this->styles as $style) {
            $styleRules .= $style;
        }
        $mods = '';
        foreach ($this->mods as $mod) {
            $mods .= $mod;
        }

        $media = '';
        foreach ($this->media as $query) {
            $media .= $query;
        }
        return ".{$this->blockName}{$this->_name}{{$styleRules}}{$media}{$mods}\n";
    }
}