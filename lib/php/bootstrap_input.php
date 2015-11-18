<?php

class bootstrap_input extends bootstrap_element
{
    public $placeholder = null;
    public $tag         = 'input';
    public $prefix      = '';
    public $suffix      = '';
    public $onfocus     = '';
    public $onblur      = '';
    public $label       = '';
    public $value       = '';
    public $help        = '';
    public $div_class   = ['form-group'=>true];

    protected function find_form()
    {
        $obj  = $this;
        $form = null;

        while(!is_null($obj->parent))
        {
            $obj = $obj->parent;
            if (is_a($obj,'bootstrap_form'))
            {
                $form = $obj;
            }
        }

        return $form;
    }

    public function pre_render()
    {
        # inline forms need to sr-only class on the label.
        $label_attribs = '';
        $form = $this->find_form();
        if(!is_null($form) and $form->has_class('form-inline'))
        {
            $label_attribs = ' class="sr-only"';
        }
        if(!is_null($form) and $form->has_class('form-horizontal'))
        {
            $label_attribs = ' class="col-sm-2 control-label"';
            $this->div_class['col-sm-10'] = true;
        }

        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('onblur');
        $this->use_property_as_attribute('onfocus');
        $this->use_property_as_attribute('value');
        
        
        $html = '';
        $html .= '<div'.$this->build_class_attribute($this->div_class).'>';

       
        if(!is_null($form) and $form->label_style == 'label')
        {
            $html .= '<label for="'.$this->name.'"'.$label_attribs.'>'.$this->label.'</label>';
        }
        else
        {
            $this->attributes['placeholder'] = strip_tags($this->label);
        }


        if ($this->prefix !== '' or $this->suffix !== '')
        {
            $html .= '<div class="input-group">';
            if ($this->prefix !== '')
            {
                $html .= '<span class="input-group-addon">'.$this->prefix.'</span>';
            }
        }

        return $html;
    }

    public function div_add_class($name)
    {
        $this->div_class[$name] = true;
        return $this;
    }

    public function div_remove_class()
    {
        $this->div_class[$name] = false;
        return $this;
    }

    public function div_has_class($name)
    {
        if (!isset($this->div_class[$name])){
            return false;
        }
        
        return ($this->div_class[$name] === true);
    }

    public function post_render()
    {
        $html = '';
        if ($this->prefix !== '' or $this->suffix !== '')
        {
            if ($this->suffix !== '')
            {
                $html .= '<span class="input-group-addon">'.$this->suffix.'</span>';
            }
            $html .= '</div>';
        }

        if ($this->help !== '')
        {
            $html .= '<p class="help-block">'.$this->help.'</p>';
        }
        $html .= '</div>';
        return $html;
    }
}

?>