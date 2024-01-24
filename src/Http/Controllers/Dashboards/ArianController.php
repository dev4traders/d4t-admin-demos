<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\StatItem;
use Dcat\Admin\Widgets\TableAdv;
use Dcat\Admin\Widgets\SimpleCard;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use D4T\Admin\Demos\Http\Widgets\ArianMetricsCard;
use D4T\Admin\Demos\Http\Widgets\BalanceChartWidget;

class ArianController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('Arian Dashboard')
            ->description('Account Statistics...')
            ->body(function(Row $row) {
                $cardWithText = "
                <div class='d-flex flex-column text-center'>
                  <h5 class='text-primary'>Card title</h5>
                  <div class='card'>
                    <div class='card-body'>
                      <h4 class='text-secondary m-0'>
                        150<span class='text-primary'>K</span>
                      </h4>
                    </div>
                  </div>
                </div>
                ";

                $cardsRow = new Row();
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);

                $row->column(12, new SimpleCard('', $cardsRow->render()));
            })
            ->body(function (Row $row) {
                $cardsRow = new Row();
                $cardsRow->column(['xl' => 3, 'md' => 6], new ArianMetricsCard());
                $cardsRow->column(['xl' => 3, 'md' => 6], new ArianMetricsCard());
                $cardsRow->column(['xl' => 3, 'md' => 6], new ArianMetricsCard());
                $cardsRow->column(['xl' => 3, 'md' => 6], new ArianMetricsCard());

                $row->column(12,
                    (
                        new SimpleCard(
                            DcatIcon::CALENDAR(true)."<span class='text-secondary ms-2'>Cards widgets row</span>",
                            $cardsRow->render()
                        )
                    )
                );
            })
            ->body(function(Row $row) {
                $cardWithText = "
                <div class='d-flex flex-column text-center'>
                  <div class='card'>
                    <div class='card-body'>
                      <h5 class='text-primary'>Card title</h5>
                      <h4 class='text-secondary m-0'>
                        150<span class='text-primary'>K</span>
                      </h4>
                    </div>
                  </div>
                </div>
                ";

                $cardsRow = new Row();
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);
                $cardsRow->column('', $cardWithText);

                $row->column(12, new SimpleCard(
                    DcatIcon::CALENDAR(true)."<span class='text-secondary ms-2'>Another cards widgets row</span>",
                    $cardsRow->render()
                ));
            })
            ->body(function (Row $row) {
                $widgetBalance = new BalanceChartWidget(500);
                $widgetBalance->colors(['#e08326', '#ffffff']);

                $cardsRow = new Row();
                $cardsRow->column(4, function (Column $column) {
                    $widgetsRow = new Row();
                    $widgetsRow->column(12, function(Column $widgetsColumn) {
                        $widgets = collect();

                        $widgets->push(
                            new SimpleCard(null,
                                (new StatItem(DcatIcon::HOME(true), 'ThinkMarkets-Demo', 'qwerty'))
                                    ->inverse()
                                    ->horizontalInverse()
                            )
                        );

                        $widgetsColumn->append($widgets->map(fn(Renderable $widget) => $widget->render())->join(''));
                    });
                    $column->append($widgetsRow->render());

                    $widgetsRow = new Row();
                    $widgetsRow->column(12, function(Column $widgetsColumn) {
                        $widgets = collect();

                        $widgets->push(
                            new SimpleCard(null,
                                (new StatItem(DcatIcon::HOME(true), 'ThinkMarkets-Demo', 'qwerty'))
                                    ->inverse()
                                    ->horizontalInverse()
                            )
                        );

                        $widgetsColumn->append($widgets->map(fn(Renderable $widget) => $widget->render())->join(''));
                    });
                    $column->append($widgetsRow->render());

                    $widgetsRow = new Row();
                    $widgetsRow->column(12, function(Column $widgetsColumn) {
                        $widgets = collect();
                        $widgets->push(new StatItem(null, '', '11 days ago', '<span class="text-primary">02.02.2023</span>'));
                        $widgets->push(new StatItem(null, '', 'Never', '<span class="text-primary">N/A</span>'));

                        $widgetsColumn->append(new SimpleCard(null, $widgets->map(fn(Renderable $widget) => $widget->render())->join('')));
                    });
                    $column->append($widgetsRow->render());
                });
                $cardsRow->column(8, $widgetBalance);

                $row->column(12, new SimpleCard(
                    '',
                    $cardsRow->render()
                ));
            })
            ->body(function (Row $row) {
                $headers = ['Open Time', 'Type', 'Symbol', 'Close Time', 'Volume', 'Open Price', 'Commission', 'Swap', 'SL', 'TP', 'Profit'];
                $rows = [];

                $rows[] = ['14.08.2023', '<span class="badge bg-success">Sell</span>', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '<span class="text-success">1.5000</span>', '1.600', '$50'];
                $rows[] = ['14.08.2023', '<span class="badge bg-success">Sell</span>', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '<span class="text-success">1.5000</span>', '1.600', '$50'];
                $rows[] = ['14.08.2023', '<span class="badge bg-danger">Sell</span>', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '<span class="text-danger">1.5000</span>', '1.600', '$50'];
                $rows[] = ['14.08.2023', '<span class="badge bg-success">Sell</span>', 'EURUSD', '14.09.2023', '0.01', '1.500', '1', '1', '<span class="text-success">1.5000</span>', '1.600', '$50'];

                $history = new TableAdv($headers, $rows);

                $widget = new SimpleCard( DcatIcon::CALENDAR(true)."<span class='text-secondary ms-2'>Trade history</span>",$history->render());
                $row->column(12, $widget);
            });
    }
}
