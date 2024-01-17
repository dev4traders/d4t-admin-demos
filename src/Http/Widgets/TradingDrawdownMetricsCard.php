<?php
declare(strict_types=1);
namespace D4T\Admin\Demos\Http\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\ApexCharts\ColumnChart;
use Dcat\Admin\Widgets\BadgeDot;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\Cards\MetricsCard;

class TradingDrawdownMetricsCard extends MetricsCard
{
    public function __construct()
    {
        $columnChart = new ColumnChart();
        $columnChart->value([0 => ['data' => [21, 22, 10, 28, 16]]]);
        $columnChart->height(200);
        $columnChart->padding([
            'top' => -40,
            'bottom' => -45,
            'left' => -20,
            'right' => -20
        ]);

        $title = 'Trading Drawdown';
        $badgeText = 'Passing';
        $badgeClass = StyleClassType::SUCCESS;
        $valueText = '$2930';
        $targetText = 'Max -$1000';

        parent::__construct($title, $columnChart);
        $this->tool(new BadgeDot($badgeClass, $badgeText));
        $this->icon(new BadgeWithIcon(DcatIcon::CHART_COLUMN(), StyleClassType::SECONDARY));
        $this->value = $valueText;
        $this->target = $targetText;
    }
}
