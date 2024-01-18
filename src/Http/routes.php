<?php

use D4T\Admin\Demos\Http\Controllers\Dashboards\WidgetController;
use Dcat\Admin\Layout\Content;
use D4T\Admin\Demos\ServiceProvider;
use Illuminate\Support\Facades\Route;
use D4T\Admin\Demos\Http\Controllers\UserController;
use D4T\Admin\Demos\Http\Controllers\TableController;
use D4T\Admin\Demos\Http\Controllers\LayoutController;
use D4T\Admin\Demos\Http\Controllers\Forms\FormController;
use D4T\Admin\Demos\Http\Controllers\Grids\GridController;
use D4T\Admin\Demos\Http\Controllers\Forms\EditorController;
use D4T\Admin\Demos\Http\Controllers\Grids\ReportController;
use D4T\Admin\Demos\Http\Controllers\BasicStructureController;
use D4T\Admin\Demos\Http\Controllers\Forms\FormWhenController;
use D4T\Admin\Demos\Http\Controllers\Grids\GridTreeController;
use D4T\Admin\Demos\Http\Controllers\Grids\SelectorController;
use D4T\Admin\Demos\Http\Controllers\Components\CardController;
use D4T\Admin\Demos\Http\Controllers\Components\TabsController;
use D4T\Admin\Demos\Http\Controllers\Dashboards\PropController;
use D4T\Admin\Demos\Http\Controllers\Components\AlertController;
use D4T\Admin\Demos\Http\Controllers\Components\ChartController;
use D4T\Admin\Demos\Http\Controllers\Components\ModalController;
use D4T\Admin\Demos\Http\Controllers\Grids\CustomGridController;
use D4T\Admin\Demos\Http\Controllers\Components\ToastrController;
use D4T\Admin\Demos\Http\Controllers\Grids\BorderTableController;
use D4T\Admin\Demos\Http\Controllers\Components\LoadingController;
use D4T\Admin\Demos\Http\Controllers\Grids\FixedColumnsController;
use D4T\Admin\Demos\Http\Controllers\Components\MarkdownController;
use D4T\Admin\Demos\Http\Controllers\Components\ProgressController;
use D4T\Admin\Demos\Http\Controllers\Dashboards\AnalyticController;
use D4T\Admin\Demos\Http\Controllers\Grids\Movies\Top250Controller;
use D4T\Admin\Demos\Http\Controllers\Components\AccordionController;
use D4T\Admin\Demos\Http\Controllers\Components\BadgeDotController;
use D4T\Admin\Demos\Http\Controllers\Grids\Movies\InTheaterController;
use D4T\Admin\Demos\Http\Controllers\Components\DropdownMenuController;
use D4T\Admin\Demos\Http\Controllers\Grids\Movies\ComingSoonController;
use D4T\Admin\Demos\Http\Controllers\Components\TipAndPopoverController;
use D4T\Admin\Demos\Http\Controllers\Components\CheckboxAndRadioController;
use D4T\Admin\Demos\Http\Controllers\Dashboards\PropSimplifiedController;

//Route::get(ServiceProvider::URL_HELPERS_SCAFFOLD, ScaffoldController::class.'@index');

Route::get(ServiceProvider::DASHBOARD_ANALYTIC, function (Content $content) {
    return (new AnalyticController)->index($content);
})->name(ServiceProvider::DASHBOARD_ANALYTIC);

Route::get(ServiceProvider::DASHBOARD_PROP, function (Content $content) {
    return (new PropController)->index($content);
})->name(ServiceProvider::DASHBOARD_PROP);
Route::get(ServiceProvider::DASHBOARD_PROP.'/preview', 'Dashboards\PropController@preview');

Route::get(ServiceProvider::DASHBOARD_WIDGETS, function (Content $content) {
    return (new WidgetController())->index($content);
})->name(ServiceProvider::DASHBOARD_WIDGETS);
Route::get(ServiceProvider::DASHBOARD_WIDGETS.'/preview', 'Dashboards\WidgetController@preview');

Route::get(ServiceProvider::DASHBOARD_PROP_SIMPLIFIED, function (Content $content) {
    return (new PropSimplifiedController)->index($content);
})->name(ServiceProvider::DASHBOARD_PROP_SIMPLIFIED);
Route::get(ServiceProvider::DASHBOARD_PROP_SIMPLIFIED.'/preview', 'Dashboards\PropSimplifiedController@preview');

Route::get(ServiceProvider::COMPONENTS_ACCORDION, function (Content $content) {
    return (new AccordionController)->index($content);
})->name(ServiceProvider::COMPONENTS_ACCORDION);

Route::get(ServiceProvider::COMPONENTS_ALERTS, function (Content $content) {
    return (new AlertController)->index($content);
})->name(ServiceProvider::COMPONENTS_ALERTS);

Route::get(ServiceProvider::COMPONENTS_BADGE_DOT, function (Content $content) {
    return (new BadgeDotController)->index($content);
})->name(ServiceProvider::COMPONENTS_BADGE_DOT);

Route::get(ServiceProvider::COMPONENTS_CHECK_AND_RADIO, function (Content $content) {
    return (new CheckboxAndRadioController)->index($content);
})->name(ServiceProvider::COMPONENTS_CHECK_AND_RADIO);
Route::get('components-check-and-radio/preview', 'Components\CheckboxAndRadioController@preview');

Route::get(ServiceProvider::COMPONENTS_DROPDOWN, function (Content $content) {
    return (new DropdownMenuController)->index($content);
})->name(ServiceProvider::COMPONENTS_DROPDOWN);
Route::get('components-dropdown/preview', 'Components\DropdownMenuController@preview');

Route::get(ServiceProvider::COMPONENTS_PROGRESS, function (Content $content) {
    return (new ProgressController)->index($content);
})->name(ServiceProvider::COMPONENTS_PROGRESS);

Route::get(ServiceProvider::COMPONENTS_TIP_AND_POPOVER, function (Content $content) {
    return (new TipAndPopoverController)->index($content);
})->name(ServiceProvider::COMPONENTS_TIP_AND_POPOVER);

Route::get(ServiceProvider::COMPONENTS_TOASTR, function (Content $content) {
    return (new ToastrController)->index($content);
})->name(ServiceProvider::COMPONENTS_TOASTR);

Route::get(ServiceProvider::COMPONENTS_TABS, function (Content $content) {
    return (new TabsController)->index($content);
})->name(ServiceProvider::COMPONENTS_TABS);

Route::get(ServiceProvider::COMPONENTS_MODAL, function (Content $content) {
    return (new ModalController)->index($content);
})->name(ServiceProvider::COMPONENTS_MODAL);
Route::get(ServiceProvider::COMPONENTS_MODAL.'/preview', 'Components\ModalController@preview');

Route::get(ServiceProvider::COMPONENTS_TABLE, function (Content $content) {
    return (new TableController)->index($content);
})->name(ServiceProvider::COMPONENTS_TABLE);

Route::get(ServiceProvider::COMPONENTS_CARDS, function (Content $content) {
    return (new CardController)->index($content);
})->name(ServiceProvider::COMPONENTS_CARDS);

Route::get(ServiceProvider::COMPONENTS_MARKDOWN, function (Content $content) {
    return (new MarkdownController)->index($content);
})->name(ServiceProvider::COMPONENTS_MARKDOWN);

Route::get(ServiceProvider::COMPONENTS_CHARTS, function (Content $content) {
    return (new ChartController)->index($content);
})->name(ServiceProvider::COMPONENTS_CHARTS);
Route::get(ServiceProvider::COMPONENTS_CHARTS.'/preview', 'Components\ChartController@preview');

Route::get(ServiceProvider::COMPONENTS_LOADING, function (Content $content) {
    return (new LoadingController)->index($content);
})->name(ServiceProvider::COMPONENTS_LOADING);
Route::get(ServiceProvider::COMPONENTS_LOADING.'/preview', 'Components\LoadingController@preview');

Route::get(ServiceProvider::GRIDS_CUSTOM, function (Content $content) {
    return (new CustomGridController)->index($content);
})->name(ServiceProvider::GRIDS_CUSTOM);

Route::get(ServiceProvider::GRIDS_GRID, function (Content $content) {
    return (new GridController)->index($content);
})->name(ServiceProvider::GRIDS_GRID);

Route::get(ServiceProvider::GRIDS_SELECTOR, function (Content $content) {
    return (new SelectorController)->index($content);
})->name(ServiceProvider::GRIDS_SELECTOR);

Route::get(ServiceProvider::GRIDS_REPORT, function (Content $content) {
    return (new ReportController)->index($content);
})->name(ServiceProvider::GRIDS_REPORT);
Route::get(ServiceProvider::GRIDS_REPORT.'/preview', 'ReportController@preview');

Route::get(ServiceProvider::GRIDS_FIXED, function (Content $content) {
    return (new FixedColumnsController)->index($content);
})->name(ServiceProvider::GRIDS_FIXED);
Route::get(ServiceProvider::GRIDS_FIXED.'/preview', 'Grids\FixedColumnsController@preview');

Route::get(ServiceProvider::GRIDS_TREE, function (Content $content) {
    return (new GridTreeController)->index($content);
})->name(ServiceProvider::GRIDS_TREE);
Route::get(ServiceProvider::GRIDS_TREE.'/preview', 'Grids\GridTreeController@preview');

Route::get(ServiceProvider::GRIDS_MOVIE_COMING, function (Content $content) {
    return (new ComingSoonController)->index($content);
})->name(ServiceProvider::GRIDS_MOVIE_COMING);
Route::get(ServiceProvider::GRIDS_MOVIE_COMING.'/preview', 'Grids\Movies\ComingSoonController@preview');

Route::resource(ServiceProvider::GRIDS_MOVIE_IN_THEATRE, InTheaterController::class, ['except' => ['create', 'show']])->name('index', ServiceProvider::GRIDS_MOVIE_IN_THEATRE);
Route::get(ServiceProvider::GRIDS_MOVIE_IN_THEATRE.'/preview', 'Grids\Movies\InTheaterController@preview');

Route::get(ServiceProvider::GRIDS_MOVIE_TOP, function (Content $content) {
    return (new Top250Controller)->index($content);
})->name(ServiceProvider::GRIDS_MOVIE_TOP);
Route::get(ServiceProvider::GRIDS_MOVIE_TOP.'/preview', 'Grids\Movies\Top250Controller@preview');

Route::get(ServiceProvider::GRIDS_BORDER_TABLE, function (Content $content) {
    return (new BorderTableController)->index($content);
})->name(ServiceProvider::GRIDS_BORDER_TABLE);
Route::get(ServiceProvider::GRIDS_BORDER_TABLE.'/preview', 'Grids\BorderTableController@preview');

Route::get(ServiceProvider::EDITORS_MARKDOWN, function (Content $content) {
    return (new EditorController)->markdown($content);
})->name(ServiceProvider::EDITORS_MARKDOWN);

Route::get(ServiceProvider::EDITORS_SUMMERCODE, function (Content $content) {
    return (new EditorController)->summercode($content);
})->name(ServiceProvider::EDITORS_SUMMERCODE);

Route::get(ServiceProvider::EDITORS_TINYMCE, function (Content $content) {
    return (new EditorController)->tinymce($content);
})->name(ServiceProvider::EDITORS_TINYMCE);
Route::get(ServiceProvider::EDITORS_TINYMCE.'/preview', 'Forms\EditorController@preview');

Route::get(ServiceProvider::FORMS_WHEN, function (Content $content) {
    return (new FormWhenController)->index($content);
})->name(ServiceProvider::FORMS_WHEN);

Route::get(ServiceProvider::FORMS_STEP, function (Content $content) {
    return (new FormWhenController)->index($content);
})->name(ServiceProvider::FORMS_STEP);
Route::get(ServiceProvider::FORMS_STEP.'/preview', 'StepFormController@preview');
Route::post(ServiceProvider::FORMS_STEP, 'StepFormController@store');

Route::get(ServiceProvider::FORMS_FORM, function (Content $content) {
    return (new FormController)->index($content);
})->name(ServiceProvider::FORMS_FORM);

Route::resource(ServiceProvider::BASIC, BasicStructureController::class)->name('index', ServiceProvider::BASIC);
Route::get(ServiceProvider::LAYOUT, function (Content $content) {
    return (new LayoutController)->index($content);
})->name(ServiceProvider::LAYOUT);

Route::resource(ServiceProvider::CLIENTS, UserController::class)->name('index', ServiceProvider::CLIENTS);

