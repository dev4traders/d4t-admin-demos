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
        $context->column(['md' => 6], function (Column $column) {
            $widgets = collect();

            $widgets->push( new StatItem(DcatIcon::ARROW_TREND_UP(true), '200', 'Trades'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '$49.611', 'Balance'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '11', 'Longs Won'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '$1.499', 'Best Trade $'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '$333,33', 'Avg Win'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '40%', 'Win Ratio'));

            $column->append($widgets->map(fn(StatItem $widget)  => $widget->inverse()->render() )->join(''));
        });

        $context->column(['md' => 6], function (Column $column) {
            $widgets = collect();

            $widgets->push( new StatItem(DcatIcon::HOME(true), '$121', 'Total P/L'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '$499', 'Equity'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '3', 'Shorts Won'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '$1', 'Worst Trade $'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '$499', 'Avg Loss'));
            $widgets->push( new StatItem(DcatIcon::HOME(true), '2,04', 'Risk Reward'));

            $column->append($widgets->map(fn(StatItem $widget)  => $widget->inverse()->render() )->join(''));
        });

        parent::__construct('Statistics', $context);

        $this->fullHeight();
        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Statistics'));
    }
}
