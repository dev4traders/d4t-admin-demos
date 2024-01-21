<?php

declare(strict_types=1);

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\StatItem;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Widgets\IconWithToolTip;
use Illuminate\Contracts\Support\Renderable;

class SimplifiedAccountDataCard extends SimpleCard
{

    public function __construct()
    {
        $widgets = collect();

        $widgets->push(new StatItem(DcatIcon::HOME(true), 'Start', '11 days ago', '02.02.2023'));
        $widgets->push(new StatItem(DcatIcon::HOME(true), 'End', 'Never', 'N/A'));
        $widgets->push(new StatItem(DcatIcon::HOME(true), 'Initail Balance', 'Deposited', '$200.000'));
        $widgets->push(new StatItem(DcatIcon::HOME(true), 'Platform', 'Trading platform', 'Metatrader4'));
        $widgets->push(new StatItem(DcatIcon::HOME(true), 'Broker', 'Trading Broker', 'Eightcap-Demo'));

        $this->fullHeight();
        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Account Data'));

        parent::__construct('Account Data', $widgets->map(fn (Renderable $widget) => $widget->render())->join(''));
    }
}
