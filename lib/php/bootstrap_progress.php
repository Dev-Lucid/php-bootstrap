<?php


class bootstrap_progress extends bootstrap_element
{
    public $tag          = 'div';
    public $value        = null;
    public $modifier     = null;
    public $stripe       = null;
    public $active       = null;
    public $values       = [];
    public $modifiers    = [];
    public $stripes      = [];
    public $actives      = [];
    public $attributes   = [
        'class'=>['progress'=>true],
    ];

    public function pre_render()
    {
        if(!is_null($this->value))
        {
            $this->values[] = $this->value;
        }

        if(!is_null($this->modifier))
        {
            foreach($this->values as $value)
            {
                $this->modifiers[] = $this->modifier;
            }
        }
        if(!is_null($this->stripe))
        {
            foreach($this->values as $value)
            {
                $this->stripes[] = $this->stripe;
            }
        }
        if(!is_null($this->active))
        {
            foreach($this->values as $value)
            {
                $this->actives[] = $this->active;
            }
        }

        for($i = 0; $i < count($this->values); $i++)
        {
            $this->post_children .= '<div class="progress-bar';
            if (isset($this->modifiers[$i]) and $this->modifiers[$i] !== '' and !is_null($this->modifiers[$i]))
            {
                $this->post_children .= ' progress-bar-'.$this->modifiers[$i];
            }
            if (isset($this->stripes[$i]) and $this->stripes[$i] !== false and !is_null($this->stripes[$i]))
            {
                $this->post_children .= ' progress-bar-striped';
            }
            if (isset($this->actives[$i]) and $this->actives[$i] !== false and !is_null($this->actives[$i]))
            {
                $this->post_children .= ' active';
            }
            $this->post_children .= '" role="progressbar" aria-valuenow="'.$this->values[$i].'" aria-valuemin="0" aria-valuemax="100"';
            $this->post_children .= ' style="width:'.$this->values[$i].'%;">';
            $this->post_children .= '<span class="sr-only">'.$this->values[$i].'%</span>';
            $this->post_children .= '</div>';

        }

        return '';
    }
}

?>