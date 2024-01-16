<?php

declare(strict_types=1);

namespace D4T\Admin\Demos\Http\Controllers\Components;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Code;
use Dcat\Admin\Layout\Content;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\BadgeDot;
use Illuminate\Routing\Controller;

class BadgeDotController extends Controller
{
    public function index(Content $content)
    {
        $types = StyleClassType::cases();

        $content->row(function (Row $row) use ($types) {
            $alerts = collect($types)->map(function ($type) {
                $alert = new BadgeDot($type);

                return $alert->render();
            })->join(' ');

            $card = new Card('badge', $alerts);


            $row->column(6, $card);
        });

        $content->row(new Card('Code', new Code(__FILE__, 15, 45)));

        $header = 'Badge';
        $content->breadcrumb('Components');
        $content->breadcrumb($header);

        return $content->header($header);
    }
}
