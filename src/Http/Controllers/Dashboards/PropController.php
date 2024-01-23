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
use Dcat\Admin\Widgets\StepsWithProgressBar;
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
                        'Multiple Asset Classes'
                    ))
                        ->bgClass(StyleClassType::SECONDARY)
                        ->textClass(StyleClassType::PRIMARY)
                        ->fullWidth()
                );
                $features->addFeature(
                    (new BadgeWithIcon(
                        DcatIcon::HELP(),
                        'No limits on trading style!'
                    ))
                        ->bgClass(StyleClassType::SECONDARY)
                        ->textClass(StyleClassType::PRIMARY)
                        ->fullWidth()
                );
                $features->addFeature(
                    (new BadgeWithIcon(
                        DcatIcon::HELP(),
                        'The best trading conditions'
                    ))
                        ->bgClass(StyleClassType::SECONDARY)
                        ->textClass(StyleClassType::PRIMARY)
                        ->fullWidth()
                );
                $features->addFeature(
                    (new BadgeWithIcon(
                        DcatIcon::HELP(),
                        'Receive up to 90% of the profit'
                    ))
                        ->bgClass(StyleClassType::SECONDARY)
                        ->textClass(StyleClassType::PRIMARY)
                        ->fullWidth()
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
//                $widget->stepActiveClass(StyleClassType::PRIMARY);
//                $widget->stepInactiveClass(StyleClassType::SECONDARY);

                $row->column(['sm' => 12], $widget);
            })
            ->body(function (Row $row) {
                $widget = (new StepsWithProgressBar())
                    ->bgClass(StyleClassType::LIGHT)
                    ->finishedClass(StyleClassType::SECONDARY)
                    ->activeClass(StyleClassType::PRIMARY)
                    ->disabledClass(StyleClassType::DANGER);
                $widget->add(
                    'Phase 1',
                    'Ended as 19.10.2023',
                    100,
                    false,
                    false,
                    "asd",
                    DcatIcon::MAP(true)
                );
                $widget->add(
                    'Phase 2',
                    '7 / 30 days',
                    20,
                    true,
                    false,
                    '',
                    DcatIcon::CALENDAR(true)
                );
                $widget->add(
                    'Funded',
                    '',
                    0,
                    false,
                    true,
                '',
                    DcatIcon::HELP(true)
                );

                $row->column(['sm' => 12], $widget);
            })
            ->body(function (Row $row) {
                $row->column(['xl' => 3, 'md' => 6], new TradingDayMetricsCard());
                $row->column(['xl' => 3, 'md' => 6], new TradingDrawdownMetricsCard());
                $row->column(['xl' => 3, 'md' => 6], new DailyLossMetricsCard());
                $row->column(['xl' => 3, 'md' => 6], new ProfitMetricsCard());
            })
            ->body(function (Row $row) {
                $widgetBalance = new BalanceChartWidget(500);
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
