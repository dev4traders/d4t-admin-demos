<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Steps;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\BadgeDot;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Traits\PreviewCode;
use Dcat\Admin\Widgets\IconicLink;
use Dcat\Admin\Widgets\SimpleCard;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\FeaturedCard;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\IconWithToolTip;
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

                $features = new FeaturedCard('Intermediate Instigator');
                $features->icon('LIVE');

                $features->addFeature(new BadgeWithIcon(DcatIcon::HELP(true), StyleClassType::PRIMARY, 'Type' ) );

                $features->addFooterElement(new IconicLink(DcatIcon::EMAIL(true), 'Contact Support', config('admin.contact-us-link', '')));
                $features->addFooterElement(new IconicLink(DcatIcon::SHARE_ALT(true), 'Share Statistics', config('admin.contact-us-link', '')));

                $row->column(12, new SimpleCard(null, $features));
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
