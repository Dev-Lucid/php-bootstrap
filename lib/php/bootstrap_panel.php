<?php


class bootstrap_panel extends bootstrap_element
{
    public $tag        = 'div';
    public $heading    = '';
    public $footer     = '';
    public $modifier   = 'default';
    public $pre_children = '<div class="panel-body">';
    public $post_children = '</div>';

    public $attributes = [
        'class'=>['panel'=>true],
    ];

    public function pre_render()
    {
        $this->add_class('panel-'.$this->modifier);
        if($this->heading !== '')
        {
            $this->pre_children = '<div class="panel-heading">'.$this->heading.'</div>'.$this->pre_children;
        }
        if($this->footer !== '')
        {
            $this->post_children = $this->post_children.'<div class="panel-footer">'.$this->footer.'</div>';
        }


        return '';
    }
}

?>