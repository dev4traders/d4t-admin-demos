<?php
declare(strict_types=1);

namespace D4T\Admin\Demos\Http\Controllers\Components;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Traits\PreviewCode;
use Dcat\Admin\Widgets\DropdownAdv;
use Illuminate\Routing\Controller;
use Dcat\Admin\Enums\ButtonClassType;

class DropdownMenuController extends Controller {
	use PreviewCode;

    private array $types = [];

	public function index(Content $content) {
        $this->types = ButtonClassType::cases();

		$header = 'DropDown';
		return $content->header($header)
			->breadcrumb($header)
			->row($this->buildPreviewButton())
			->row($this->base())
			->row($this->outline());
//			->row($this->split())
//			->row($this->outlineSplit())
//			->row($this->specific());
	}

	public function base() {
		$base = collect($this->types)->map(function ($type) {
			$dropdown = new DropdownAdv();
			return $dropdown->button($type->value)
				->buttonClass($type)
				->add('option1')
				->add('option2', null, TRUE)
				->add('option1', null, TRUE, TRUE)
				->render();
		})->join(' ');
		return Card::make('Base Dropdown', $base);
	}

	public function outline() {
		$base = collect($this->types)->map(function ($type) {
			$dropdown = new DropdownAdv();
			return $dropdown->button($type->value)
				->buttonClass($type, true)
				->add('option1')
				->add('option2', null, TRUE)
				->add('option1', null, TRUE, TRUE)
				->render();
		})->join(' ');
		return Card::make('Outline Dropdown', $base);
	}

	public function split() {
		$base = collect($this->types)->map(function ($type) {
			$dropdown = new DropdownAdv();
			return $dropdown->button($type->value)
				->buttonClass($type)
				->toggleSplit()
				->add('option1')
				->add('option2', null, TRUE)
				->add('option1', null, TRUE, TRUE)
				->render();
		})->join(' ');
		return Card::make('Split Dropdown', $base);
	}

	public function outlineSplit() {
		$base = collect($this->types)->map(function ($type) {
			$dropdown = new DropdownAdv();
			return $dropdown->button($type->value)
				->buttonClass($type, true)
				->toggleSplit()
				->add('option1')
				->add('option2', null, TRUE)
				->add('option1', null, TRUE, TRUE)
				->render();
		})->join(' ');
		return Card::make('Outline Split Dropdown', $base);
	}

	public function specific() {
		$hiddenArrow = new DropdownAdv();
		$hiddenArrow->button('hidden arrow')
			->buttonClass(ButtonClassType::PRIMARY)
			->hideArrow()
			->add('option1')
			->add('option2', null, TRUE)
			->add('option1', null, TRUE, TRUE)
			->render();
		$iconWithDropdown = new DropdownAdv();
		$iconWithDropdown->button('with icon')
			->buttonClass(ButtonClassType::PRIMARY)
			->icon(DcatIcon::MENU)
			->add('option1')
			->add('option2', null, TRUE)
			->add('option1', null, TRUE, TRUE)
			->render();
		$icon = new DropdownAdv();
		$icon->buttonClass(ButtonClassType::PRIMARY)
            ->rounded()
			->hideArrow()
			->icon( DcatIcon::DOTS_VERTICAL_ROUNDED)
			->add('option1')
			->add('option2', null, TRUE)
			->add('option1', null, TRUE, TRUE)
			->render();
		return Card::make('specific Dropdown', $hiddenArrow . ' ' . $iconWithDropdown . ' ' . $icon);
	}
}
