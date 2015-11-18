<?php

class bootstrap_icon extends bootstrap_element
{
    public $tag      = 'span';
    
    public function pre_render()
    {
        $this->add_class('glyphicon');
        $this->add_class('glyphicon-'.$this->children[0]);
        $this->children = [];
    }
}

?>