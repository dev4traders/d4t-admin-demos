<?php

namespace D4T\Admin\Demos\Http\Widgets;

use Dcat\Admin\Support\Helper;
use Dcat\Admin\Widgets\ApexCharts\AreaChart;

class BalanceChartWidget extends AreaChart
{
    protected array $breakpoints = [
        'sm' => 576,
        'md' => 768,
        'lg' => 992,
        'xl' => 1200,
        'xxl' => 1400
    ];

    public function __construct(int $height = 515, array $responsive = []) {
        $generator = function ($len, $min = 10, $max = 300) {
            for ($i = 0; $i <= $len; $i++) {
                yield mt_rand($min, $max);
            }
        };

        $this->value([
            [
                'name' => 'Balance',
                'data' => collect($generator(30))->toArray()
            ],
        ]);
        $this->height = $height;

        $this->dataLabels([
            'enabled' => false
        ]);
        $this->options['xaxis'] = Helper::array([
            'title' => [
                'text' => 'Count',
            ],
            'type' => 'numeric'
        ]);
        $this->options['yaxis'] = Helper::array([
            'title' => [
                'text' => 'Balance',
            ]
        ]);

        foreach($responsive as $breakpoint => $height) {
            $this->options['responsive'][] = [
                'breakpoint' => $this->breakpoints[$breakpoint],
                'options' => [
                    'chart' => [
                        'height' => $height
                    ]
                ]
            ];
        }

        parent::__construct();
    }

}
