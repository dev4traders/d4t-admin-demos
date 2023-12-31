<?php

namespace D4T\Admin\Demos\Http\Renderable;

use D4T\Admin\Demos\Http\Widgets\Charts\Bar;
use D4T\Admin\Demos\Http\Widgets\Charts\BarChart;
use Dcat\Admin\Support\LazyRenderable;

class BarChartLazyRenderable extends LazyRenderable
{
    public function render()
    {
        return new BarChart();
    }
}
