<?php
declare(strict_types=1);
namespace D4T\Admin\Demos\Http\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\ApexCharts\AreaChart;
use Dcat\Admin\Widgets\BadgeDot;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\Cards\MetricsCard;

class ProfitMetricsCard extends MetricsCard
{
    public function __construct()
    {
        $radialBar = new AreaChart();
        $radialBar->value([
            0 => [
                'name' => 'chart',
                'data' => [
                    [
                        'x' => 1996,
                        'y' => 322
                    ],
                    [
                        'x' => 1997,
                        'y' => 324
                    ],
                    [
                        'x' => 1998,
                        'y' => 300
                    ],
                    [
                        'x' => 1999,
                        'y' => 354
                    ],
                ]
            ]
        ]);
        $radialBar->height(200);
        $radialBar->padding([
            'top' => -40,
            'bottom' => -45,
            'left' => -20,
            'right' => -20
        ]);

        $title = 'Profit';
        $badgeText = 'Passed';
        $badgeClass = StyleClassType::SUCCESS;
        $valueText = '$2930';
        $targetText = 'Target $4500';

        parent::__construct($title, $radialBar);
        $this->tool(new BadgeDot($badgeClass, $badgeText));
        $this->icon(
            (new BadgeWithIcon(DcatIcon::DOLLAR_SIGN()))
                ->bgClass(StyleClassType::SECONDARY)
        );
        $this->value = $valueText;
        $this->target = $targetText;
    }
}
