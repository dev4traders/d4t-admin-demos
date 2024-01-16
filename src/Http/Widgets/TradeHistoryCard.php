<?php

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\Table;
use Dcat\Admin\Widgets\TableAdv;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Widgets\IconWithToolTip;

class TradeHistoryCard extends SimpleCard
{

    public function __construct()
    {

        $headers = ['Open Time', 'Type', 'Symbol', 'Close Time', 'Volume', 'Open Price', 'Commission', 'Swap', 'SL', 'TP', 'Profit'];
        $rows = [];

        $rows[] = ['14.08.2023', 'Sell', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '1.5000', '1.600', '$50'];
        $rows[] = ['14.08.2023', 'Sell', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '1.5000', '1.600', '$50'];
        $rows[] = ['14.08.2023', 'Sell', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '1.5000', '1.600', '$50'];
        $rows[] = ['14.08.2023', 'Sell', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '1.5000', '1.600', '$50'];

        $history = new TableAdv($headers, $rows);

        parent::__construct('Trade History', $history->render());

        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Trade History'));
    }
}
