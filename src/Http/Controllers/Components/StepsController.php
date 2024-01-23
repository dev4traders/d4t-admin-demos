<?php
declare(strict_types=1);

namespace D4T\Admin\Demos\Http\Controllers\Components;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Code;
use Dcat\Admin\Widgets\Steps;
use Dcat\Admin\Layout\Content;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\StepsWithProgressBarCustom;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\StepsWithProgressBar;

class StepsController extends Controller
{
    public function index(Content $content)
    {

        $content->row(function (Row $row) {
            $widget = new Steps();
            $widget->classExt('d-none d-md-flex');
            $widget->add('You are here', 'Step1 - Challenge Account', true);
            $widget->add('Next Phase', 'Step2 - Funded Account');
            $widget->add('Funded', 'Last stage');
//                $widget->stepActiveClass(StyleClassType::PRIMARY);
//                $widget->stepInactiveClass(StyleClassType::SECONDARY);

            $row->column(['sm' => 12], $widget);
        })
        ->body(function (Row $row) {
            $widget = (new StepsWithProgressBar())
                ->bgClass(StyleClassType::LIGHT)
                //->textClass(StyleClassType::PRIMARY)
                ->finishedClass(StyleClassType::SECONDARY)
                ->activeClass(StyleClassType::PRIMARY)
                ->disabledClass(StyleClassType::DANGER)
                ->borderClass(StyleClassType::PRIMARY);
            $widget->add(
                'Phase 1',
                'Ended as 19.10.2023',
                100,
                false,
                false,
                "asd",
                DcatIcon::MAP(true)
            );
            $widget->add(
                'Phase 2',
                '7 / 30 days',
                20,
                true,
                false,
                '',
                DcatIcon::CALENDAR(true)
            );
            $widget->add(
                'Funded',
                '',
                0,
                false,
                true,
                '',
                DcatIcon::HELP(true)
            );

            $row->column(['sm' => 12], $widget);
        })
        ->body(function (Row $row) {
            $widget = (new StepsWithProgressBarCustom())
                ->bgClass(StyleClassType::LIGHT)
                ->finishedClass(StyleClassType::SECONDARY)
                ->activeClass(StyleClassType::PRIMARY)
                ->disabledClass(StyleClassType::DANGER)
                ->borderClass(StyleClassType::PRIMARY);
            $widget->add(
                'Phase 1',
                'Ended as 19.10.2023',
                100,
                false,
                false,
                "asd",
                DcatIcon::MAP(true)
            );
            $widget->add(
                'Phase 2',
                '7 / 30 days',
                20,
                true,
                false,
                '',
                DcatIcon::CALENDAR(true)
            );
            $widget->add(
                'Funded',
                '',
                0,
                false,
                true,
                '',
                DcatIcon::HELP(true)
            );

            $row->column(['sm' => 12], $widget);
        });

        $content->row(new Card('Code', new Code(__FILE__, 15, 77)));

        $header = 'Steps';
//        $content->breadcrumb('Components');
//        $content->breadcrumb($header);

        return $content->header($header);
    }
}
