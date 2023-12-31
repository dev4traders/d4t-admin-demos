<?php

namespace D4T\Admin\Demos\Http\Renderable;

use D4T\Admin\Demos\Http\Forms\UserProfile;
use D4T\Admin\Demos\Http\Forms\UserProfileForm;
use Dcat\Admin\Support\LazyRenderable;

class ModalForm extends LazyRenderable
{
    public function render()
    {
        return UserProfileForm::make()->setCurrentUrl($this->current);
    }
}
