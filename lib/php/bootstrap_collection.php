<?php

class bootstrap_collection extends bootstrap_element
{
    public function render()
    {   
        $html = '';
        $html .= $this->render_children();
        return $html;
    }
}
