<?php

namespace D4T\Admin\Demos\Http\Renderable;

use App\Models\User;
use Dcat\Admin\Grid;
use Funded\Core\Models\UserBase;
use Dcat\Admin\Grid\LazyRenderable;
use Dcat\Admin\Models\Administrator;

class UserTableLazyRenderable extends LazyRenderable
{
    public function grid(): Grid
    {
        return new Grid(new UserBase(), function (Grid $grid) {
            $grid->column('id', 'ID')->sortable();
            $grid->column('username');
            $grid->column('name');
            $grid->column('created_at');
            $grid->column('updated_at');

            $grid->quickSearch(['id', 'username', 'name']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('username')->width(4);
                $filter->like('name')->width(4);
            });
        });
    }
}
