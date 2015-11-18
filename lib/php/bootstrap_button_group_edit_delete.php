<?php

class bootstrap_button_group_edit_delete extends bootstrap_element
{
    public $tag                = 'div';
    public $edit_label         = '';
    public $edit_icon          = 'edit';
    public $edit_url           = '';
    public $edit_modifier      = 'info';
    
    public $delete_label       = '';
    public $delete_icon        = 'trash';
    public $delete_url         = '';
    public $delete_modifier    = 'warning';
    public $delete_function    = '';
    
    public $pull               = 'right';

    public $attributes = [
        'role'=>'group',
        'aria-label'=>'...',
        'class'=>['btn-group'=>true],
    ];

    public function pre_render()
    {
        if ($this->pull == 'right')
        {
            $this->pull_right();    
        }


        $edit_label = '';
        if($this->edit_icon !== '')
        {
            $edit_label .= bs::icon($this->edit_icon);
        }
        if($this->edit_label !== '')
        {
            $edit_label .= ' '.$this->edit_label;
        }

        $delete_label = '';
        if($this->delete_icon !== '')
        {
            $delete_label .= bs::icon($this->delete_icon);
        }
        if($this->delete_label !== '')
        {
            $delete_label .= ' '.$this->delete_label;
        } 


        

        $this->add(bs::button(['type'=>'button','label'=>$edit_label,  'modifier'=>$this->edit_modifier, 'href'=>$this->edit_url]));
        $this->add(bs::button(['type'=>'button','label'=>$delete_label,'modifier'=>$this->delete_modifier, 'onclick'=>$this->delete_function.'(\''.$this->delete_url.'\');']));
        return '';

    }
}
