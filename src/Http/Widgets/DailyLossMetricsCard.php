<?php
declare(strict_types=1);
namespace D4T\Admin\Demos\Http\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\ApexCharts\DonutChart;
use Dcat\Admin\Widgets\BadgeDot;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\Cards\MetricsCard;

class DailyLossMetricsCard extends MetricsCard
{
    public function __construct()
    {
        $donutChart = new DonutChart();
        $donutChart->value([33,33,33]);
        $donutChart->hollowSize(60);
        $donutChart->height(150);
        $donutChart->startAngle(-90);
        $donutChart->endAngle(90);
        $donutChart->padding([
            'top' => -10,
        ]);
        $donutChart->fontSize(16);
        $donutChart->valueOffsetY(-2);

        $title = 'Daily loss';
        $badgeText = 'Failed';
        $badgeClass = StyleClassType::DANGER;
        $valueText = '-$451';
        $targetText = 'Target 10';

        parent::__construct($title, $donutChart);
        $this->tool(new BadgeDot($badgeClass, $badgeText));
        $this->icon(new BadgeWithIcon(DcatIcon::ARROW_TREND_UP(), StyleClassType::SECONDARY));
        $this->value = $valueText;
        $this->target = $targetText;
    }
}
