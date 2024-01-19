<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Steps;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\ImageAdv;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Traits\PreviewCode;
use Dcat\Admin\Widgets\IconicLink;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\DropdownItem;
use Dcat\Admin\Widgets\FeaturedCard;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\DropdownWithIcon;
use D4T\Admin\Demos\Http\Widgets\StatisticsCard;
use D4T\Admin\Demos\Http\Widgets\AccountDataCard;
use D4T\Admin\Demos\Http\Widgets\DailySummaryCard;
use D4T\Admin\Demos\Http\Widgets\TradeHistoryCard;
use D4T\Admin\Demos\Http\Widgets\ProfitMetricsCard;
use D4T\Admin\Demos\Http\Widgets\BalanceChartWidget;
use D4T\Admin\Demos\Http\Widgets\DailyLossMetricsCard;
use D4T\Admin\Demos\Http\Widgets\TradingDayMetricsCard;
use D4T\Admin\Demos\Http\Widgets\TradingInstrumentsCard;
use D4T\Admin\Demos\Http\Widgets\TradingDrawdownMetricsCard;

class PropController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('Prop Dashboard')
            ->description('Account Statistics...')
            ->body(function (Row $row) {
                $features = new FeaturedCard('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id es');
                $features->image(new ImageAdv('/vendor/dcat-admin/images/default-avatar.png', '/vendor/dcat-admin/images/default-avatar.png', ''));
                $features->headerContent(
                    (new DropdownWithIcon([
                        new DropdownItem('Menu item 1'),
                        new DropdownItem('Menu item 2'),
                        new DropdownItem('Menu item 3'),
                    ], null, StyleClassType::DARK))
                        ->title('$50.000 Challenge', StyleClassType::INFO)
                        ->description('Some description', StyleClassType::INFO)
                        ->icon(DcatIcon::SETTINGS, StyleClassType::INFO)
                );

                $features->addFeature(
                    (new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'Multiple Asset Classes'
                    ))->fullWidth()
                );
                $features->addFeature(
                    (new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'No limits on trading style!'
                    ))->fullWidth()
                );
                $features->addFeature(
                    (new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'The best trading conditions'
                    ))->fullWidth()
                );
                $features->addFeature(
                    (new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'Receive up to 90% of the profit'
                    ))->fullWidth()
                );

                $features->addFooterLink(
                    (new IconicLink(
                        DcatIcon::EMAIL(true),
                        'Contact Support',
                        config('admin.contact-us-link', '')
                    ))->asButton()
                );
                $features->addFooterLink(
                    (new IconicLink(
                        DcatIcon::SHARE_ALT(true),
                        'Share Statistics',
                        config('admin.contact-us-link', '')
                    ))->asButton()
                );

                $row->column(12, $features);
            })
            ->body(function (Row $row) {
                $widget = new Steps();
                $widget->classExt('d-none d-md-flex');
                $widget->add('You are here', 'Step1 - Challenge Account', true);
                $widget->add('Next Phase', 'Step2 - Funded Account');
                $widget->add('Funded', 'Last stage');

                $row->column(['sm' => 12], $widget);
            })
            ->body(function (Row $row) {
                $row->column(['xxl' => 3, 'md' => 6], new TradingDayMetricsCard());
                $row->column(['xxl' => 3, 'md' => 6], new TradingDrawdownMetricsCard());
                $row->column(['xxl' => 3, 'md' => 6], new DailyLossMetricsCard());
                $row->column(['xxl' => 3, 'md' => 6], new ProfitMetricsCard());
            })
            ->body(function (Row $row) {
                $widgetBalance = new BalanceChartWidget();
                $row->column(12, $widgetBalance);
            })
            ->body(function (Row $row) {

                $statistics = new StatisticsCard();
                $row->column(['xxl' => 6, 'lg' => 7], $statistics);

                $accountData = new AccountDataCard();
                $row->column(['xxl' => 6, 'lg' => 5], $accountData);
            })
            ->body(function (Row $row) {
                $row->column(6, new TradingInstrumentsCard());
                $row->column(6, new DailySummaryCard());
            })
            ->body(function (Row $row) {

                $history = new TradeHistoryCard();
                $row->column(12, $history);
            });
    }
}
