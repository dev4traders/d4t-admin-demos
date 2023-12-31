<?php

namespace D4T\Admin\Demos\Http\Renderable;

use D4T\Admin\Demos\Http\Widgets\Charts\Bar;
use Dcat\Admin\Support\LazyRenderable;

class BarChart extends LazyRenderable
{
    public function render()
    {
        return Bar::make();
    }
}
