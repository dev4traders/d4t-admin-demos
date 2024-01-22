<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\DropdownItem;
use Dcat\Admin\Widgets\DropdownWithIcon;
use D4T\Admin\Demos\Http\Widgets\StatisticsCard;
use D4T\Admin\Demos\Http\Widgets\TradeHistoryCard;
use D4T\Admin\Demos\Http\Widgets\BalanceChartWidget;
use D4T\Admin\Demos\Http\Widgets\TradingObjectiveCard;
use D4T\Admin\Demos\Http\Widgets\SimplifiedAccountDataCard;

class PropSimplifiedDashboard
{
    public static function make(Content $content): Content
    {
        return $content
            ->header('PropSimplified Dashboard')
            ->description('Account Statistics...')
            ->body(function (Row $row) {
                $selector = (new DropdownWithIcon([
                    new DropdownItem('Menu item 1'),
                    new DropdownItem('Menu item 2'),
                    new DropdownItem('Menu item 3'),
                ], null, StyleClassType::DARK))
                    ->title('$50.000 Challenge', StyleClassType::INFO)
                    ->description('Some description', StyleClassType::INFO)
                    ->icon(DcatIcon::SETTINGS, StyleClassType::INFO);

                $row->column(12, $selector);
            })
            ->body(function (Row $row) {

                $widgetBalance = new BalanceChartWidget(515, [
                    'lg' => 300
                ]);
                $row->column(['lg' => 8], $widgetBalance);

                $accountData = new SimplifiedAccountDataCard();
                $row->column(['lg' => 4], $accountData);
                // $radialBar = new RadialBarChart();
                // $radialBar->value(89);
                // $radialBar->hollowSize(30);
                // //$radialBar->height(380);
                // $row->column(
                //     3,
                //     (new SimpleCard('Profit Target', $radialBar))->tool(new IconWithToolTip(DcatIcon::HELP(), 'Profit Target'))
                //         //->style('height: 380px;')
                //         ->footer('<span class="font-weight-bold">$3000</span>/<span class="text-muted">$5000</span>')
                // );
            })
            ->body(function (Row $row) {

                $to = new TradingObjectiveCard();
                $row->column(['xl' => 7, 'lg' => 6], $to);

                $accountData = new StatisticsCard();
                $row->column(['xl' => 5, 'lg' => 6], $accountData);
            })
            // ->body(function (Row $row) {
            //     $row->column(6, new TradingInstrumentsCard());

            //     $stat = new StatisticsCard();
            //     $row->column(6, $stat);
            // })
            ->body(function (Row $row) {

                $history = new TradeHistoryCard();
                $row->column(12, $history);
            });
    }
}
