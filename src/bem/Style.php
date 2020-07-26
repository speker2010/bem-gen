<?php
namespace bem;

class Style
{
    private $_ruleName;
    private $_ruleValue;

    public function __construct(string $name, string $value)
    {
        $this->_validateRuleName($name);
        $this->_ruleName = $name;
        $this->_validateRuleValue($value);
        $this->_ruleValue = $value;
    }

    private function _validateRuleName(string $name)
    {
        $rules = [
            'background',
            'background-color',
            'background-image',
            'background-position',
            'background-repeat',
            'background-size',
            'border',
            'border-width',
            'border-style',
            'border-color',
            'border-raduis',
            'color',
            'font',
            'font-size',
            'font-weight',
            'font-style',
            'line-height',
            'padding',
            'padding-left',
            'padding-right',
            'padding-bottom',
            'padding-top',
            'margin',
            'margin-top',
            'margin-right',
            'margin-bottom',
            'margin-left',
            'display',
            'position',
            'top',
            'right',
            'bottom',
            'left'
        ];
        if (!in_array($name, $rules)) {
            throw new UnknownStyleRuleName($name);
        }
    }

    private function _validateRuleValue(string $value)
    {

    }

    public function __toString()
    {
        return "{$this->_ruleName}: {$this->_ruleValue};\n";
    }
}