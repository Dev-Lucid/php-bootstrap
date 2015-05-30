<?php

class bootstrap_col extends bootstrap_element
{
    public $size   = null;
    public $offset = null;

    public function pre_render()
    {
        if(is_array($this->size))
        {
            $this->sizes($this->size);
        }

        if(is_array($this->offset))
        {
            $this->offsets($this->offset);
        }
        return '';
    }
}

?>