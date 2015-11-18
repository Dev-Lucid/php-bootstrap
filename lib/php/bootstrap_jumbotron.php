<?php


class bootstrap_jumbotron extends bootstrap_element
{
    public $tag          = 'div';
    public $title        = '';
    public $body         = '';
    public $title_tag    = 'h1';
    public $full_width   = false;
    public $attributes   = [
        'class'=>['jumbotron'=>true],
    ];

    public function pre_render()
    {
        if($this->body !== '')
        {
            $this->add($this->body);
        }

        if($this->full_width === true)
        {
            $this->pre_children .= '<div class="container">';
            $this->post_children .= '</div>';
        }
      
        if($this->title !== '')
        {
            $this->pre_children .= '<'.$this->title_tag.'>'.$this->title.'</'.$this->title_tag.'> ';
        }

        return '';
    }
}

?>