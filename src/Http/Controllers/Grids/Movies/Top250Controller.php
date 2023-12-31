<?php

namespace D4T\Admin\Demos\Http\Controllers\Grids\Movies;

use D4T\Admin\Demos\Repositories\Top250;
use Dcat\Admin\Grid;

class Top250Controller extends ComingSoonController
{
    protected $header = 'Top250';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($repository = null)
    {
        return parent::grid(new Top250());
    }
}
