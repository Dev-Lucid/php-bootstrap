<?php


class bootstrap_label extends bootstrap_element
{
    public $tag        = 'span';
    public $text       = '';
    public $modifier   = 'default';  # default, primary, warning, error, info, success
    public $attributes = [
        'class'=>['label'=>true],
    ];

    public function pre_render()
    {

        if (count($this->children) == 0 and $this->text !== '')
        {
            $this->children[] = $this->text;
        }

        $this->add_class('btn-'.$this->modifier);
        return '';
    }
}

?>