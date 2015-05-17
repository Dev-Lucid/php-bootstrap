<?php

class bootstrap_input extends bootstrap_element
{
    public $placeholder = null;
    public $tag         = 'input';
    public $prefix      = '';
    public $suffix      = '';
    public $onfocus     = '';
    public $onblur      = '';

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

        $this->use_property_as_attribute('name');
        $this->use_property_as_attribute('onblur');
        $this->use_property_as_attribute('onfocus');
        $this->attributes['placeholder'] = strip_tags($this->label);
        
        $html = '';
        $html .= '<div class="form-group">';
        $html .= '<label for="'.$this->name.'"'.$label_attribs.'>'.$this->label.'</label>';

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

        $html .= '</div>';
        return $html;
    }
}

?>