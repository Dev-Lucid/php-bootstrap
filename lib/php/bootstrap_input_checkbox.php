<?php

class bootstrap_input_checkbox extends bootstrap_element
{
    public $tag    = 'input';
    public $value  = '';
    public $inline = false;
    public $checked = false;

    public function pre_render()
    {
        if ($this->checked === true or $this->checked === SQL_TRUE)
        {
            $this->checked = 'checked';
        }
        else
        {
            $this->checked = null;
        }
        $this->attributes['type'] = 'checkbox';
        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('value','','on');
        $this->use_property_as_attribute('checked','','checked');

        if($this->inline === true)
        {
            return '<label class="checkbox-inline">';        
        }
        else
        {
            return '<div class="checkbox"><label>';        
        }
    }

    public function post_render()
    {
        if($this->inline === true)
        {
            return $this->label.'</label>';
        }
        else
        {
             return $this->label.'</label></div>';
        }  
    }
}

?>