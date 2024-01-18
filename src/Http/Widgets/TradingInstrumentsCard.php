<?php

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\ApexCharts\PieChart;
use Dcat\Admin\Widgets\IconWithToolTip;
use Dcat\Admin\Widgets\SimpleCard;

class TradingInstrumentsCard extends SimpleCard
{
    public function __construct()
    {
        $pieChart = new PieChart();
        $pieChart->value([30, 60]);
        $pieChart->height(240);
        $pieChart->labels(['EURUSD', 'BTCUSD']);
        $pieChart->padding([
            'top' => -10,
            'bottom' => -10,
            'left' => -10,
            'right' => -10
        ]);

        parent::__construct('Trading instruments', $pieChart);
        $this->fullHeight();
        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Trading instruments'));
    }
}