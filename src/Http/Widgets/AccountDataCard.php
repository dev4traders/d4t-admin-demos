<?php

declare(strict_types=1);

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\StatItem;
use Dcat\Admin\Widgets\IconicLink;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Widgets\IconWithToolTip;
use Illuminate\Contracts\Support\Renderable;

class AccountDataCard extends SimpleCard
{
    public function __construct()
    {
        $context = new Row();
        $context->column(12, function (Column $column) {
            $widgets = collect();

            $widgets->push(new StatItem(DcatIcon::HOME(true), 'Start', '11 days ago', '02.02.2023'));
            $widgets->push(new StatItem(DcatIcon::HOME(true), 'End', 'Never', 'N/A'));
            $widgets->push(new StatItem(DcatIcon::HOME(true), 'Initail Balance', 'Deposited', '$200.000'));
            $widgets->push(new StatItem(DcatIcon::HOME(true), 'Platform', 'Trading platform', 'Metatrader4'));
            $widgets->push(new StatItem(DcatIcon::HOME(true), 'Broker', 'Trading Broker', 'Eightcap-Demo'));
            $widgets->push(new StatItem(
                DcatIcon::HOME(true),
                'Share',
                'Lorem ipsum',
                (new IconicLink(DcatIcon::SHARE_ALT(true), 'Link', '#'))->render()
            ));

            $column->append($widgets->map(fn (Renderable $widget) => $widget->render())->join(''));
        });

        parent::__construct('Account Data', $context);

        $this->fullHeight();
        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Account Data'));
    }
}
