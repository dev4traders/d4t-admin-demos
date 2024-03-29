<?php
declare(strict_types=1);

namespace D4T\Admin\Demos\Http\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Code;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\AlertAdv;
use D4T\Core\Enums\StyleClassType;
use Illuminate\Routing\Controller;

class AlertController extends Controller
{
    public function index(Content $content)
    {
        $faker = Factory::create();
        $types = StyleClassType::cases();

        $content->row(function (Row $row) use ($faker, $types) {
            $alerts = collect($types)->map(function ($type) use($faker) {
                $alert = new AlertAdv($faker->text, $type->value);

                return $alert->class($type)->render();
            })->join(' ');
            $card1 = new Card('basic Alerts', $alerts);

            $alerts = collect($types)->map(function ($type) use($faker) {
                $alert = new AlertAdv($faker->text, $type->value, $type);

                return $alert->dismissable()->icon(DcatIcon::HOME())->render();
            })->join(' ');
            $card2 = new Card('Dismissable Alerts with icon', $alerts);

            $row->column(6, $card1);
            $row->column(6, $card2);
        });

        $content->row(new Card('Code', new Code(__FILE__, 15, 45)));

        $header = 'Alerts';
        $content->breadcrumb('Components');
        $content->breadcrumb($header);

        return $content->header($header);
    }
}
