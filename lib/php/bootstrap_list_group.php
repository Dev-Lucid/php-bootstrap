<?php


class bootstrap_list_group extends bootstrap_element
{
    public $tag          = 'div';
    public $attributes   = [
        'class'=>['list-group'=>true],
    ];

    
    public function pre_render()
    {
        #var_dump($this);
        
        foreach($this->children as $child)
        {
            $child->add_class('list-group-item');
        }        
        
        return '';
    }
}

?>