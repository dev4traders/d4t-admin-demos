<?php
declare(strict_types=1);

namespace D4T\Admin\Demos\Http\Controllers;

use Faker\Factory;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\TableAdv;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Traits\PreviewCode;
use Illuminate\Routing\Controller;

class TableController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        $faker = Factory::create();
        $countColumns = 5;
        $countRows = 5;
        $headers = [];
        $rows = [];
        for($i = 0; $i < $countColumns; $i++) {
            $headers[] = $faker->text(10);
        }

        for($j = 0; $j < $countRows; $j++) {
            $row = [];
            for($i = 0; $i < $countColumns; $i++) {
                $row[] = $faker->text(20);
            }
            $rows[] = $row;
        }

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows);

            $row->column(12, new Card('Basic', $table1));
        });

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows, StyleClassType::DARK);

            $row->column(12, new Card('Colored', $table1));
        });

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows);
            $table1->headerClass(StyleClassType::DANGER);

            $row->column(12, new Card('Colored Header', $table1));
        });

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows);
            $table1->withFooter();

            $row->column(12, new Card('With Footer', $table1));
        });

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows);
            $table1->striped();

            $row->column(12, new Card('Striped', $table1));
        });

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows);
            $table1->withBorder();

            $row->column(12, new Card('Bordered', $table1));
        });

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows);
            $table1->withHover();

            $row->column(12, new Card('With Hover', $table1));
        });

        $content->row(function(Row $row) use($headers, $rows) {
            $table1 = new TableAdv($headers, $rows);
            $table1->small();

            $row->column(12, new Card('Small', $table1));
        });

        //todo::add Contextual Row Classes
        // $content->row(function(Row $row) use($headers, $rows) {
        //     $table1 = new Table($headers, $rows);
        //     $table1->setRows($rows); // with custom class

        //     $row->column(12, new Card('Contextual Row Classes', $table1));
        // });

        return $content->header('Tables');
    }

}
