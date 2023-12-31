<?php

namespace D4T\Admin\Demos\Http\Actions\Grid;

use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Grid\RowAction;
use D4T\Admin\Demos\Http\Forms\ResetPasswordForm;

class ResetPasswordRowAction extends RowAction
{
    protected $title = '修改密码';

    public function render()
    {
        $form = ResetPasswordForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
