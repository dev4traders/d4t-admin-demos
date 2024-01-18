<?php
declare(strict_types=1);
namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\StatItem;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Widgets\IconWithToolTip;

class AccountDataCard extends SimpleCard
{

    public function __construct()
    {
        $start = (new StatItem(DcatIcon::HOME(true), 'Start', '10 days ago', '02.02.2023'))->render();
        $end = (new StatItem(DcatIcon::HOME(true), 'End', 'Never', 'N/A'))->render();
        $initBalance = (new StatItem(DcatIcon::HOME(true), 'Initail Balance', 'Deposited', '$200.000'))->render();
        $platform = (new StatItem(DcatIcon::HOME(true), 'Platform', 'Trading platform', 'Metatrader4'))->render();
        $broker = (new StatItem(DcatIcon::HOME(true), 'Broker', 'Trading Broker', 'Eightcap-Demo'))->render();
        $share = (new StatItem(DcatIcon::HOME(true), 'Share', 'Lorem ipsum', '<a href="#">Link</a>'))->render();

        parent::__construct('Account Data', $start.$end.$initBalance.$platform.$broker.$share);

        $this->fullHeight();
        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Account Data'));
    }
}
