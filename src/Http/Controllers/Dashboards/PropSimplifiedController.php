<?php

namespace D4T\Admin\Demos\Http\Controllers\Dashboards;

use Dcat\Admin\Layout\Content;
use Dcat\Admin\Traits\PreviewCode;
use Illuminate\Routing\Controller;

class PropSimplifiedController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return PropSimplifiedDashboard::make($content);
    }
}
