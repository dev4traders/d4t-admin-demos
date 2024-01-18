<?php

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\TableAdv;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Widgets\IconWithToolTip;

class DailySummaryCard extends SimpleCard
{

    public function __construct()
    {

        $headers = ['Date', 'Trades', 'Lots', 'Result'];
        $rows = [];

        $rows[] = ['5 Oct', '9', '19.90', '-$4,345.63'];
        $rows[] = ['4 Oct', '21', '36.00', '$1,748.40'];
        $rows[] = ['3 Oct', '8', '12.70', '$105.94'];
        $rows[] = ['2 Oct', '23', '36.09', '$1,065.94'];
        $rows[] = ['29 Sep', '10', '11.70', '$1,916.85'];

        $history = new TableAdv($headers, $rows);

        parent::__construct('Daily summary', $history->render());

        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Daily summary'));
    }
}
