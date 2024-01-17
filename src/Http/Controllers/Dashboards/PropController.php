<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\DropdownItem;
use Dcat\Admin\Widgets\DropdownWithIcon;
use Dcat\Admin\Widgets\IconWithToolTip;
use Dcat\Admin\Widgets\Steps;
use Dcat\Admin\Layout\Content;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Traits\PreviewCode;
use Dcat\Admin\Widgets\IconicLink;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\FeaturedCard;
use Dcat\Admin\Widgets\BadgeWithIcon;
use D4T\Admin\Demos\Http\Widgets\StatisticsCard;
use D4T\Admin\Demos\Http\Widgets\AccountDataCard;
use D4T\Admin\Demos\Http\Widgets\TradeHistoryCard;
use D4T\Admin\Demos\Http\Widgets\ProfitMetricsCard;
use D4T\Admin\Demos\Http\Widgets\BalanceChartWidget;
use D4T\Admin\Demos\Http\Widgets\DailyLossMetricsCard;
use D4T\Admin\Demos\Http\Widgets\TradingDayMetricsCard;
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
                $features->icon('IMG NOT LOADED');
                $features->headerContent(
                    (new DropdownWithIcon([
                        new DropdownItem('Menu item 1'),
                        new DropdownItem('Menu item 2'),
                        new DropdownItem('Menu item 3'),
                    ]))
                        ->title('$50.000 Challenge')
                        ->description('Some description')
                        ->icon(DcatIcon::SETTINGS)
                );

                $features->addFeature(
                    new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'Multiple Asset Classes'
                    )
                );
                $features->addFeature(
                    new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'No limits on trading style!'
                    )
                );
                $features->addFeature(
                    new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'The best trading conditions'
                    )
                );
                $features->addFeature(
                    new BadgeWithIcon(
                        DcatIcon::HELP(),
                        StyleClassType::PRIMARY,
                        'Receive up to 90% of the profit'
                    )
                );

                $features->addFooterLink(new IconicLink(DcatIcon::EMAIL(true), 'Contact Support', config('admin.contact-us-link', '')));
                $features->addFooterLink(new IconicLink(DcatIcon::SHARE_ALT(true), 'Share Statistics', config('admin.contact-us-link', '')));

                $row->column(12, $features);
            })
            ->body(function (Row $row) {

                $widget = new Steps();

                $widget->add('your are here', 'Step1 - Challenge Account', true);
                $widget->add('Next Phase', 'Step2 - Funded Account');

                $row->column(12, $widget);
            })
            ->body(function (Row $row) {
                $row->column(3, new TradingDayMetricsCard());
                $row->column(3, new TradingDrawdownMetricsCard());
                $row->column(3, new DailyLossMetricsCard());
                $row->column(3, new ProfitMetricsCard());
            })
            ->body($this->newline())
            ->body(function (Row $row) {

                $widgetBalance = new BalanceChartWidget();
                $row->column(12, $widgetBalance);
            })
            ->body($this->newline())
            ->body(function (Row $row) {

                $statictics = new StatisticsCard();
                $row->column(6, $statictics);

                $accountData = new AccountDataCard();
                $row->column(6, $accountData);
            })
            ->body($this->newline())
            ->body(function (Row $row) {

                $history = new TradeHistoryCard();
                $row->column(12, $history);
            });
    }
}
