<?php

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\BadgeDot;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\BadgeWithIcon;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;
use Dcat\Admin\Widgets\Widget;
use Dcat\Admin\Widgets\IconWithToolTip;
use Illuminate\Contracts\Support\Renderable;

class DailyDrawdownMetricsCard extends Widget
{
    protected $view = 'admin::widgets.daily-drawdown-metrics-card';

    protected string $title;
    protected string $value;
    protected string $chart_text;
    protected string $chart_value;
    protected ?string $tool = null;
    protected ?string $badge = null;
    protected string $bar;

    function __construct(string $title,string $value,string $chart_text = "",string $chart_value = "")
    {
        $this->title = $title;
        $this->value = $value;
        $this->chart_value = $chart_value;
        $this->chart_text = $chart_text;

        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Account Data'));

        $bar = new RadialBarChart();
        $bar->value(35);
        $bar->hollowSize(60);
        $bar->height(150);
        $bar->startAngle(-90);
        $bar->endAngle(90);
        $bar->padding([
            'top' => -10,
        ]);
        $bar->fontSize(16);
        $bar->valueOffsetY(-2);
        $this->bar = $bar;
    }

    public function tool(string|Renderable|\Closure $content) : static
    {
        $this->tool = $this->toString($content);

        return $this;
    }

    public function badge(string|Renderable|\Closure $content) : static
    {
        $this->badge = $this->toString($content);

        return $this;
    }
    public function defaultVariables() : array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'value' => $this->value,
            'tool' => $this->tool,
            'badge' => $this->badge,
            'bar' => $this->bar,
            'chart_text' => $this->chart_text,
            'chart_value' => $this->chart_value,
        ];
    }

    function render(){
        $content = parent::render();
        $card = new Card("",$content);
        $card->class('card daily-drawdown-metrics-card');
        return $card->render();
    }
}