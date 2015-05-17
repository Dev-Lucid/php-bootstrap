<?php


class bootstrap_alert extends bootstrap_element
{
    public $tag          = 'div';
    public $modifier     = 'warning';
    public $title        = '';
    public $body         = '';
    public $close_button = true;
    public $attributes   = [
        'class'=>['alert'=>true],
        'role'=>'alert',
    ];

    public function pre_render()
    {
        $this->add_class('alert-'.$this->modifier);
        if($this->close_button === true)
        {
            $this->add_class('alert-dismissible');
        }
        if($this->body !== '')
        {
            $this->add($this->body);
        }

        if($this->close_button === true)
        {
            $this->pre_children .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
        if($this->title !== '')
        {
            $this->pre_children .= '<strong>'.$this->title.'</strong> ';
        }

        return '';
    }
}

?>