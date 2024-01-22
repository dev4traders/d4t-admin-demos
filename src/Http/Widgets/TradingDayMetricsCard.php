<?php
declare(strict_types=1);
namespace D4T\Admin\Demos\Http\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;
use Dcat\Admin\Widgets\BadgeDot;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\Cards\MetricsCard;

class TradingDayMetricsCard extends MetricsCard
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

        $title = 'Trading day';
        $badgeText = 'Ending in 23d 4h';
        $badgeClass = StyleClassType::SUCCESS;
        $valueText = '3 days';
        $targetText = 'Target 10 days';

        parent::__construct($title, $radialBar);
        $this->tool(new BadgeDot($badgeClass, $badgeText));
        $this->icon(
            (new BadgeWithIcon(DcatIcon::CALENDAR()))
                ->bgClass(StyleClassType::SECONDARY)
        );
        $this->value = $valueText;
        $this->target = $targetText;
    }
}
