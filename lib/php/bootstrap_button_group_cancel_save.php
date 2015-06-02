<?php

class bootstrap_button_group_cancel_save extends bootstrap_element
{
    public $tag        = 'div';
    public $cancel_label = 'Cancel';
    public $cancel_icon = 'arrow-left';
    public $cancel_onclick = 'history.go(-1);';
    public $cancel_modifier = 'warning';

    public $save_label = 'Save';
    public $save_icon  = 'ok';
    public $save_modifier = 'primary';

    public $attributes = [
        'role'=>'group',
        'aria-label'=>'...',
        'class'=>['btn-group'=>true],
    ];

    public function pre_render()
    {
        $cancel_label = $this->cancel_label;
        if($this->cancel_icon !== '')
        {
            $cancel_label = bs::icon($this->cancel_icon).' '.$cancel_label;
        }        

        $save_label = $this->save_label;
        if($this->save_icon !== '')
        {
            $save_label = bs::icon($this->save_icon).' '.$save_label;
        }

        $this->add(bs::button(['type'=>'button','label'=>$cancel_label,'onclick'=>$this->cancel_onclick,'modifier'=>$this->cancel_modifier]));
        $this->add(bs::button(['type'=>'submit','label'=>$save_label,'modifier'=>$this->save_modifier]));
        return '';

    }
}

?>