<?php

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Illuminate\Http\Request;
use Dcat\Admin\Widgets\SimpleCard;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\StatProgress;
use Dcat\Admin\Widgets\StatProgressRadial;
use Dcat\Admin\Widgets\IconWithToolTip;

class TradingObjectiveCard extends SimpleCard
{

    public function __construct()
    {
        $minDays = (new StatProgressRadial(DcatIcon::HOME(true), 'Minimum trading Days', 2/5*100, '2/5', StyleClassType::INFO))->withCard()->render();
        //$minDays = (new StatProgress(DcatIcon::HOME(true), 'Minimum trading Days', 2/5*100, '2/5', StyleClassType::INFO))->withCard()->render();
        $maxDays = (new StatProgress(DcatIcon::HOME(true), 'Maximum trading Days', 2/5*100, '2/30', StyleClassType::INFO))->withCard()->render();
        $dailyLoss = (new StatProgress(DcatIcon::HOME(true), 'Maximum daily Loss', 2000/5000*100, '$3450 / $5000', StyleClassType::WARNING))->withCard()->render();
        $loss = (new StatProgress(DcatIcon::HOME(true), 'Maximum Loss', 2000/5000*100, '$3450 / $5000', StyleClassType::SUCCESS))->withCard()->render();

        $this->fullHeight();
        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Profit Target'));

        parent::__construct('Trading Objectives', $minDays.$maxDays.$dailyLoss.$loss);

    }
}
