<?php
declare(strict_types=1);
namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\BadgeDot;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\Cards\MetricsCard;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;

class DailyLossMetricsCard extends MetricsCard
{
    public function __construct()
    {
        $bar = new RadialBarChart();
        $bar->value(89);
        $bar->hollowSize(60);
        $bar->height(150);
        $bar->startAngle(-90);
        $bar->endAngle(90);
        $bar->padding([
            'top' => -10,
        ]);
        $bar->fontSize(16);
        $bar->valueOffsetY(-2);

        $title = 'Daily loss';
        $badgeText = 'Failed';
        $badgeClass = StyleClassType::DANGER;
        $valueText = '-$451';
        $targetText = 'Target 10';

        parent::__construct($title, $bar);
        $this->tool(new BadgeDot($badgeClass, $badgeText));
        $this->icon(new BadgeWithIcon(DcatIcon::ARROW_TREND_UP(), StyleClassType::SECONDARY));
        $this->value = $valueText;
        $this->target = $targetText;
    }
}
