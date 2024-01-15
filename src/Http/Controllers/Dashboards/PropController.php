<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Steps;
//use Illuminate\Routing\Controller;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Traits\PreviewCode;
use Dcat\Admin\Widgets\IconicLink;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\FeaturedCard;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\IconWithToolTip;
use D4T\Admin\Demos\Http\Widgets\AccountDataCard;
use D4T\Admin\Demos\Http\Widgets\TradeHistoryCard;
use D4T\Admin\Demos\Http\Widgets\BalanceChartWidget;
use D4T\Admin\Demos\Http\Widgets\TradingObjectiveCard;
use D4T\Admin\Demos\Http\Widgets\ProfitTargetChartCard;

class PropController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('Prop Dashboard')
            ->description('Account Statistics...')
            ->body(function (Row $row) {

                $widget = new Steps();

                $widget->add('your are here', 'Step1 - Challenge Account', DcatIcon::HOME(true), true);
                $widget->add('Next Phase', 'Step2 - Funded Account', DcatIcon::HOME(true));

                $row->column(12, $widget);
            })
            ->body(function (Row $row) {

                $features = new FeaturedCard();
                $features->icon(DcatIcon::HOME(true));

                $features->addFeature(new BadgeWithIcon(__('userdash.plan_type'), 'description', new IconWithToolTip(DcatIcon::HELP(), __('userdash.help_plan_type'))));
                $features->addFeature(new BadgeWithIcon(__('userdash.platform'), 'title', new IconWithToolTip(DcatIcon::HELP(), __('userdash.help_platform'))));
                $features->addFeature(new BadgeWithIcon(__('userdash.starting_balance'), 'title', new IconWithToolTip(DcatIcon::HELP(), __('userdash.help_starting_balance'))));

                $features->footerAddElement(new IconicLink(DcatIcon::EMAIL(true), __('userdash.contact_support'), config('admin.contact-us-link', '')));
                $features->footerAddElement(new IconicLink(DcatIcon::SHARE_ALT(true), __('userdash.share_statistics'), config('admin.contact-us-link', '')));

                $row->column(12, $features);
            })
            ->body(function (Row $row) {

                $widgetBalance = new BalanceChartWidget();
                $row->column(9, $widgetBalance);

                $widgetProfitTarget = new ProfitTargetChartCard(3000, 5000);
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
            })
            ;
    }
}
