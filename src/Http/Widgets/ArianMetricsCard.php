<?php
declare(strict_types=1);
namespace D4T\Admin\Demos\Http\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;
use Dcat\Admin\Widgets\BadgeDot;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\Cards\MetricsCard;

class ArianMetricsCard extends MetricsCard
{
    public function __construct()
    {
        $radialBar = new RadialBarChart();
        $radialBar->value(intval((3000/5000)*100));
        $radialBar->hollowSize(40);
        $radialBar->height(200);
        $radialBar->padding([
            'top' => -30,
            'bottom' => -30,
            'left' => -10,
            'right' => -10
        ]);
        $radialBar->colors(['#e08326', '#ffffff']);

        parent::__construct('Some title', $radialBar);
        $this->value('<span class="text-primary">$</span>1.650');
        $this->titleClass(StyleClassType::SECONDARY);
        $this->valueClass(StyleClassType::SECONDARY);
    }
}
