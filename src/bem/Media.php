<?php
namespace bem;

class Media
{
    use ConfigParser;

    private $_condition;
    private $_blockName;
    private $_elementName;
    private $_modName;
    public $styles = [];

    public function __construct(string $condition, array $styles, string $blockName, string $elementName = null, string $modName = null)
    {
        $this->_condition = $this->_parseCondition($condition);
        $this->_blockName = $blockName;
        $this->_elementName = $elementName;
        $this->_modName = $modName;
        $this->parseConfig($styles);
    }

    private function _parseCondition(string $condition)
    {
        return $condition;
    }

    public function __toString()
    {
        $condition = '()';
        $styleRules = '';
        foreach ($this->styles as $style) {
            $styleRules .= $style;
        }
        return "@media {$condition} {.{$this->_blockName}{$this->_elementName}{$this->_modName} {{$styleRules}}}";
    }
}