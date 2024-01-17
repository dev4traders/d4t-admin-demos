<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Traits\PreviewCode;
use Dcat\Admin\Widgets\SimpleCard;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\IconWithToolTip;
use D4T\Admin\Demos\Http\Widgets\AccountDataCard;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;
use D4T\Admin\Demos\Http\Widgets\TradeHistoryCard;
use D4T\Admin\Demos\Http\Widgets\ProfitMetricsCard;
use D4T\Admin\Demos\Http\Widgets\BalanceChartWidget;
use D4T\Admin\Demos\Http\Widgets\DailyLossMetricsCard;
use D4T\Admin\Demos\Http\Widgets\TradingObjectiveCard;
use D4T\Admin\Demos\Http\Widgets\TradingDayMetricsCard;
use D4T\Admin\Demos\Http\Widgets\TradingDrawdownMetricsCard;

class PropSimplifiedController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('PropSimplified Dashboard')
            ->description('Account Statistics...')
            ->body(function (Row $row) {

                $widgetBalance = new BalanceChartWidget();
                $row->column(9, $widgetBalance);

                $radialBar = new RadialBarChart();
                $radialBar->value(89);
                $radialBar->hollowSize(30);
                //$radialBar->height(380);
                $row->column(
                    3,
                    (new SimpleCard('Profit Target', $radialBar))->tool(new IconWithToolTip(DcatIcon::HELP(), 'Profit Target'))
                        //->style('height: 380px;')
                        ->footer('<span class="font-weight-bold">$3000</span>/<span class="text-muted">$5000</span>')
                );
            })
            ->body($this->newline())
            ->body(function (Row $row) {

                $to = new TradingObjectiveCard();
                $row->column(9, $to);

                $accountData = new AccountDataCard();
                $row->column(3, $accountData);
            })
            ->body($this->newline())
            ->body(function (Row $row) {

                $history = new TradeHistoryCard();
                $row->column(12, $history);
            });
    }
}
