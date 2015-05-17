<?php


class bootstrap_button extends bootstrap_element
{
    public $tag        = 'button';
    public $modifier   = 'default';  # default, primary, warning, error, info, success
    public $type       = 'button';   # button, submit, link
    public $onclick    = '';
    public $size       = 'md';       # xs, sm, md, lg (md results in no additional class being added)
    public $block      = false;
    public $active     = false;
    public $attributes = [
        'class'=>['btn'=>true],
    ];

    public function pre_render()
    {
        $label = $this->label;
        $this->add($label);

        # Link is a bit special
        if ($this->type === 'link')
        {
            $this->type = 'button';
            $this->add_class('btn-link');
        }
        $this->use_property_as_attribute('type');
        $this->use_property_as_attribute('onclick');

        # md doesn't require an additional class, all other sizes do
        if ($this->size !== 'md')
        {
            $this->add_class('btn-'.$this->size);
        }

        if ($this->block === true)
        {
            $this->add_class('btn-block');
        }

        # apply the active attribute
        if ($this->active === true)
        {
            $this->add_class('active');
        }

        $this->add_class('btn-'.$this->modifier);
        return '';
    }
}

?>