<?php


class bootstrap_well extends bootstrap_element
{
    public $tag        = 'div';
    public $text       = '';
    public $size       = '';  # sm, lg
    public $attributes = [
        'class'=>['well'=>true],
    ];

    public function pre_render()
    {
        if (count($this->children) == 0 and $this->text !== '')
        {
            $this->children[] = $this->text;
        }
        if($this->size !== '')
        {
            $this->add_class('well-'.$this->size);
        }
        return '';
    }
}

?>