<?php

namespace D4T\Admin\Demos\Http\Controllers\Grids;

use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use D4T\Admin\Demos\Http\Forms\UserProfileForm;
use Dcat\Admin\Traits\PreviewCode;
use D4T\Admin\Demos\Repositories\Report;
use D4T\Admin\Demos\Http\Renderable\UserTableLazyRenderable;
use Illuminate\Routing\Controller;

class BorderTableController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('Border mode')
            ->description('Border mode + asynchronous loading function demonstration')
            ->body($this->grid());
    }

    protected function grid()
    {
        return new Grid(new Report(), function (Grid $grid) {
            $grid->name;
            $grid->content->limit(50);
            $grid->avgMonthCost->display('Form aync')->modal('Popup Title', UserProfileForm::make());
            $grid->avgYearCost->display('Form')->modal('Popup Title', UserTableLazyRenderable::make());
            $grid->avgYearVist->hide();
            $grid->incrs;
            $grid->date->sortable();
            $grid->created_at;

            $grid->tools($this->buildPreviewButton());

            $grid->tableCollapse(false);

            $grid->withBorder();

            $grid->disableActions();
            $grid->disableBatchDelete();
            $grid->disableCreateButton();
            $grid->disableCreateButton();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->scope(1, admin_trans_field('month'))->where('date', 2019, '<=');
                $filter->scope(2, admin_trans_label('quarter'))->where('date', 2019, '<=');
                $filter->scope(3, admin_trans_label('year'))->where('date', 2019, '<=');

                $filter->equal('content');
                $filter->equal('cost');
            });
        });
    }
}
