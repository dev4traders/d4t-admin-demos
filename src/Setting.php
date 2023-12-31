<?php

namespace D4T\Admin\Demos;

use Dcat\Admin\Extend\Setting as Form;
use Dcat\Admin\Support\Helper;

class Setting extends Form
{
    public function title()
    {
        return $this->trans('demos.title');
    }

    protected function formatInput(array $input)
    {
        return $input;
    }

    public function form()
    {

    }
}
