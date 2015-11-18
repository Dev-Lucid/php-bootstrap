<?php


class bootstrap_fieldset extends bootstrap_element
{
    public $tag          = 'fieldset';
    public $title        = '';
    public $body         = '';
    
    public function pre_render()
    {
        if($this->body !== '')
        {
            $this->add($this->body);
        }

        if($this->title !== '')
        {
            $this->pre_children .= '<legend>'.$this->title.'</legend> ';
        }

        return '';
    }
}

?>