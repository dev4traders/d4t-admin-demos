<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Traits\PreviewCode;
use Illuminate\Routing\Controller;
use D4T\Admin\Demos\Http\Widgets\AccountDataCard;
use D4T\Admin\Demos\Http\Widgets\TradeHistoryCard;
use D4T\Admin\Demos\Http\Widgets\BalanceChartWidget;
use D4T\Admin\Demos\Http\Widgets\TradingObjectiveCard;
use D4T\Admin\Demos\Http\Widgets\ProfitTargetChartCard;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;

class PropController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('Prop Dashboard')
            ->description('Account Statistics...')
            ->body(function (Row $row) {

                $widgetBalance = new BalanceChartWidget();
                $row->column(12, $widgetBalance);
            })
            ->body(function (Row $row) {
                $radialBar = new RadialBarChart();
                $radialBar->value((3000/5000)*100);
                $radialBar->hollowSize(30);
                $radialBar->height(200);
                $radialBar->padding([
                    'top' => -40,
                    'bottom' => -45,
                    'left' => -20,
                    'right' => -20
                ]);

                ($widgetProfitTarget = new ProfitTargetChartCard(
                    'Trading day',
                    'Ending in 23d 4h',
                    StyleClassType::SUCCESS,
                    '3 days',
                    'Target 10 days',
                    $radialBar
                ))
                    ->icon(DcatIcon::CALENDAR());
                $row->column(3, $widgetProfitTarget);
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
