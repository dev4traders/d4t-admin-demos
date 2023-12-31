<?php

namespace D4T\Admin\Demos\Http\Controllers\Grids;

use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Traits\PreviewCode;
use D4T\Admin\Demos\Repositories\Report;
use Illuminate\Routing\Controller;

class FixedColumnsController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('Fixed Column')
            ->description('表格固定列功能示例')
            ->body($this->grid());
    }

    protected function grid()
    {
        return new Grid(new Report(), function (Grid $grid) {
            $grid->column('name');
            $grid->column('content')->limit(50);
            $grid->column('cost')->sortable();
            $grid->column('avgQuarterCost')->setHeaderAttributes(['style' => 'color:#5b69bc']);
            $grid->column('avgYearCost');
            $grid->column('avgMonthVist');
            $grid->column('avgQuarterVist');
            $grid->column('avgYearVist');
            $grid->column('incrs');
            $grid->column('avgVists');
            $grid->column('date')->sortable();
            $grid->column('created_at');
            $grid->column('updated_at');

            $grid->tools($this->buildPreviewButton());

            $grid->fixColumns(2);

            $grid->disableActions();
            $grid->disableBatchDelete();
            $grid->disableCreateButton();
            $grid->disableCreateButton();
        });
    }
}
