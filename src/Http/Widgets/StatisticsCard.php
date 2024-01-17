<?php

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Widgets\StatItem;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Widgets\IconWithToolTip;

class StatisticsCard extends SimpleCard
{

    public function __construct()
    {

        $context = new Row();
        $context->column(6, function (Column $column) {
            $widgets = collect();

            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Start', '10 days ago'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'End', 'Never'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Initail Balance', 'Deposited'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Platform', 'Trading platform'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Broker', 'Trading Broker'));

            $column->append($widgets->map(fn(StatItem $widget)  => $widget->inverse()->render() )->join(''));
        });

        $context->column(6, function (Column $column) {
            $widgets = collect();

            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Start', '10 days ago'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'End', 'Never'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Initail Balance', 'Deposited'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Platform', 'Trading platform'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), 'Broker', 'Trading Broker'));

            $column->append($widgets->map(fn(StatItem $widget)  => $widget->inverse()->render() )->join(''));
        });

        parent::__construct('Statistics', $context);

        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Statistics'));
    }
}
