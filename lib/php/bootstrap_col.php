<?php

class bootstrap_col extends bootstrap_element
{
    public $size   = null;
    public $offset = null;

    public function pre_render()
    {
        $index_aliases = ['xs','sm','md','lg'];
        if(is_array($this->size))
        {
            $sizes = $this->size;
            
            for($i=0;$i<count($sizes);$i++)
            {
                if(!is_null($sizes[$i]))
                {
                    $this->add_class('col-'.$index_aliases[$i].'-'.$sizes[$i]);
                }
            }
        }

        if(is_array($this->offset))
        {
            $offsets = $this->offset;
            
            for($i=0;$i<count($offsets);$i++)
            {
                if(!is_null($offsets[$i]))
                {
                    $this->add_class('col-'.$index_aliases[$i].'-offset-'.$offsets[$i]);
                }
            }
        }
        return '';
    }
}

?>