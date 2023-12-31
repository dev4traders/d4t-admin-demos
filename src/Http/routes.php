<?php

use Illuminate\Support\Facades\Route;
use D4T\Admin\Helpers\ServiceProvider;

Route::get(ServiceProvider::URL_HELPERS_SCAFFOLD, ScaffoldController::class.'@index');
