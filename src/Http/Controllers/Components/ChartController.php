<?php

namespace D4T\Admin\Demos\Http\Controllers\Components;

use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;
use D4T\Admin\Demos\Http\Widgets\Sessions;
use Dcat\Admin\Traits\PreviewCode;
use D4T\Admin\Demos\Http\Widgets\NewDevices;
use D4T\Admin\Demos\Http\Widgets\TotalUsers;
use Illuminate\Routing\Controller;
use D4T\Admin\Demos\Http\Widgets\ProductOrders;
use D4T\Admin\Demos\Http\Widgets\TicketsWidget;
use D4T\Admin\Demos\Http\Widgets\Charts\MyAjaxBar;
use D4T\Admin\Demos\Http\Widgets\GoalOverviewWidget;
use D4T\Admin\Demos\Http\Renderable\BarChartLazyRenderable;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;

class ChartController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content->header('Charts')
            ->description("Apexchart")
            ->body($this->buildPreviewButton().$this->newline())
            ->body($this->newline())
            ->body(function (Row $row) {
                $widgetTickets = new TicketsWidget();
                $row->column(4, $widgetTickets);

                $goalWidget = new GoalOverviewWidget();
                $row->column(4, $goalWidget);

            })
            ->body($this->newline())
            ->body(function (Row $row) {
                $bar = new BarChartLazyRenderable();
                $row->column(4, new Card('Bar', $bar->render()));

                $ajaxBar = new MyAjaxBar();

                $row->column(4, new Card('Ajax Bar', $ajaxBar));
            })
            ->body($this->newline())
            ->body(function (Row $row) {
                $donut = new NewDevices();
                $row->column(4, $donut);

                $round = new ProductOrders();
                $row->column(4, $round);
            })
            ->body($this->newline())
            ->body(function (Row $row) {
                $bar = new Sessions();
                $row->column(4, $bar);

                $card = new TotalUsers();
                $row->column(4, $card);
            })
            ->body(function (Row $row) {
                $bar = new RadialBarChart();
                $bar->hollowSize(60)->value(99)->offset(50);
                $bar->colors([Admin::color()->orange()]);
                $row->column(2, $bar);
            });
    }

}
