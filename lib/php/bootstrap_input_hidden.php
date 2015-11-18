<?php


class bootstrap_input_hidden extends bootstrap_element
{
    public $tag        = 'input';
    public $attributes = [
        'name'=>'',
        'value'=>'',
        'type'=>'hidden',
    ];

    public function pre_render()
    {
        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('value');
    }
}
