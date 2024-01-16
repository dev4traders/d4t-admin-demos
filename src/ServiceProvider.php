<?php

namespace D4T\Admin\Demos;

use Dcat\Admin\Enums\ExtensionType;
use Dcat\Admin\Extend\ServiceProvider as ServiceProviderBase;

class ServiceProvider extends ServiceProviderBase
{
    public function getExtensionType(): ExtensionType
    {
        return ExtensionType::ADDON;
    }

    const DASHBOARDS = 'dashboards';
    const DASHBOARD_ANALYTIC = 'dashbords/analytic';
    const DASHBOARD_PROP = 'dashbords/prop';

    const COMPONENTS = 'components';
    const COMPONENTS_ACCORDION = 'components.accordion';
    const COMPONENTS_ALERTS = 'components.alerts';
    const COMPONENTS_BADGE_DOT = 'components.badge_dot';
    const COMPONENTS_CHECK_AND_RADIO = 'components.check_and_radio';
    const COMPONENTS_DROPDOWN = 'components.dropdown';
    const COMPONENTS_PROGRESS = 'components.progress';
    const COMPONENTS_TIP_AND_POPOVER = 'components.tip_and_popover';
    const COMPONENTS_TOASTR = 'components.toastr';
    const COMPONENTS_TABS = 'components.tabs';
    const COMPONENTS_MODAL = 'components.modal';
    const COMPONENTS_CARDS = 'components.cards';
    const COMPONENTS_MARKDOWN = 'components.markdown';
    const COMPONENTS_CHARTS = 'components.charts';
    const COMPONENTS_TABLE = 'components.table';
    const COMPONENTS_LOADING = 'components.loading';

    const GRIDS = 'grids';
    const GRIDS_CUSTOM = 'grids.custom';
    const GRIDS_GRID = 'grids.grid';
    const GRIDS_SELECTOR = 'grids.selector';
    const GRIDS_REPORT = 'grids.report';
    const GRIDS_FIXED = 'grids.fixed';
    const GRIDS_TREE = 'grids.tree';
    const GRIDS_BORDER_TABLE = 'grids.border';

    const GRIDS_MOVIE_COMING = 'grids.coming';
    const GRIDS_MOVIE_IN_THEATRE = 'grids.in_theatre';
    const GRIDS_MOVIE_TOP = 'grids.top';

    const EDITORS = 'editors';
    const EDITORS_MARKDOWN = 'editors.markdown';
    const EDITORS_SUMMERCODE = 'editors.summercode';
    const EDITORS_TINYMCE = 'editors.tinymce';

    const FORMS = 'forms';
    const FORMS_WHEN = 'forms.when';
    const FORMS_STEP = 'forms.step';
    const FORMS_FORM = 'forms.form';

    const BASIC = 'basic';
    const CLIENTS = 'clients';
    const LAYOUT = 'layout';

    const PERMISSION_DEMOS = 'mng.demos';
    const PERMISSION_DASHBOARDS = 'dashboards';
    const PERMISSION_DASHBOARD_ANALYTIC = 'dashbord.analytic';
    const PERMISSION_DASHBOARD_PROP = 'dashbord.prop';

    const PERMISSION_COMPONENTS = 'components';
    const PERMISSION_COMPONENTS_ACCORDION = 'components.accordion';
    const PERMISSION_COMPONENTS_ALERTS = 'components.alerts';
    const PERMISSION_COMPONENTS_BADGE_DOT  = 'components.badge_dot';
    const PERMISSION_COMPONENTS_CHECK_AND_RADIO = 'components.check_and_radio';
    const PERMISSION_COMPONENTS_DROPDOWN = 'components.dropdown';
    const PERMISSION_COMPONENTS_PROGRESS = 'components.progress';
    const PERMISSION_COMPONENTS_TIP_AND_POPOVER = 'components.tip_and_popover';
    const PERMISSION_COMPONENTS_TOASTR = 'components.toastr';
    const PERMISSION_COMPONENTS_TABS = 'components.tabs';
    const PERMISSION_COMPONENTS_MODAL = 'components.modal';
    const PERMISSION_COMPONENTS_CARDS = 'components.cards';
    const PERMISSION_COMPONENTS_MARKDOWN = 'components.markdown';
    const PERMISSION_COMPONENTS_CHARTS = 'components.charts';
    const PERMISSION_COMPONENTS_TABLE = 'components.table';
    const PERMISSION_COMPONENTS_LOADING = 'components.loading';

    const PERMISSION_GRIDS = 'grids';
    const PERMISSION_GRIDS_CUSTOM = 'grids.custom';
    const PERMISSION_GRIDS_GRID = 'grids.grid';
    const PERMISSION_GRIDS_SELECTOR = 'grids.selector';
    const PERMISSION_GRIDS_REPORT = 'grids.report';
    const PERMISSION_GRIDS_FIXED = 'grids.fixed';
    const PERMISSION_GRIDS_TREE = 'grids.tree';
    const PERMISSION_GRIDS_BORDER_TABLE = 'grids.border';

    const PERMISSION_GRIDS_MOVIE_COMING = 'grids.coming';
    const PERMISSION_GRIDS_MOVIE_IN_THEATRE = 'grids.in_theatre';
    const PERMISSION_GRIDS_MOVIE_TOP = 'grids.top';

    const PERMISSION_EDITORS = 'editors';
    const PERMISSION_EDITORS_MARKDOWN = 'editors.markdown';
    const PERMISSION_EDITORS_SUMMERCODE = 'editors.summercode';
    const PERMISSION_EDITORS_TINYMCE = 'editors.tinymce';

    const PERMISSION_FORMS = 'forms';
    const PERMISSION_FORMS_WHEN = 'forms.when';
    const PERMISSION_FORMS_STEP = 'forms.step';
    const PERMISSION_FORMS_FORM = 'forms.form';

    const PERMISSION_BASIC = 'basic';
    const PERMISSION_STUCTURE = 'basic.structure';
    const PERMISSION_CLIENTS = 'clients';
    const PERMISSION_LAYOUT = 'layout';

    protected $menu = [
        [
            'title' => 'Demos',
            'uri' => '/empty',
            'icon' => 'fa-bars',
            'permission_slug' => self::PERMISSION_DEMOS
        ],

        // Dashboards
        [
            'title'     => 'Dashboards',
            'icon' => 'fa-bars',
            'uri'       => '/empty',
            'parent' => 'Demos',
            'permission_slug' => self::PERMISSION_DASHBOARDS
        ],
        [
            'title'     => 'Analytics',
            'icon' => 'fa-bars',
            'uri'       => self::DASHBOARD_ANALYTIC,
            'parent' => 'Dashboards',
            'permission_slug' => self::PERMISSION_DASHBOARD_ANALYTIC
        ],
        [
            'title'     => 'prop',
            'icon' => 'fa-bars',
            'uri'       => self::DASHBOARD_PROP,
            'parent' => 'Dashboards',
            'permission_slug' => self::PERMISSION_DASHBOARD_PROP
        ],

        // Components
        [
            'title'     => 'Components',
            'icon' => 'fa-bars',
            'uri'       => '/empty',
            'parent' => 'Demos',
            'permission_slug' => self::PERMISSION_COMPONENTS
        ],
        [
            'title'     => 'Accordion',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_ACCORDION,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_ACCORDION
        ],
        [
            'title'     => 'Alerts',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_ALERTS,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_ALERTS
        ],
        [
            'title'     => 'BadgeDot',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_BADGE_DOT,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_BADGE_DOT
        ],
        [
            'title'     => 'Check_and_radio',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_CHECK_AND_RADIO,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_CHECK_AND_RADIO
        ],
        [
            'title'     => 'Dropdown',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_DROPDOWN,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_DROPDOWN
        ],
        [
            'title'     => 'progress',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_PROGRESS,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_PROGRESS
        ],
        [
            'title'     => 'tip_and_popover',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_TIP_AND_POPOVER,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_TIP_AND_POPOVER
        ],
        [
            'title'     => 'toastr',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_TOASTR,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_TOASTR
        ],
        [
            'title'     => 'tabs',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_TABS,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_TABS
        ],
        [
            'title'     => 'modals',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_MODAL,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_MODAL
        ],
        [
            'title'     => 'Cards',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_CARDS,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_CARDS
        ],
        [
            'title'     => 'markdown',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_MARKDOWN,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_MARKDOWN
        ],
        [
            'title'     => 'Charts',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_CHARTS,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_CHARTS
        ],
        [
            'title'     => 'table',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_TABLE,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_TABLE
        ],
        [
            'title'     => 'loading',
            'icon' => 'fa-bars',
            'uri'       => self::COMPONENTS_LOADING,
            'parent' => 'Components',
            'permission_slug' => self::PERMISSION_COMPONENTS_LOADING
        ],

        // Grids
        [
            'title'     => 'Grids',
            'icon' => 'fa-bars',
            'uri'       => '/empty',
            'parent' => 'Demos',
            'permission_slug' => self::PERMISSION_GRIDS
        ],
        [
            'title'     => 'border',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_BORDER_TABLE,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_BORDER_TABLE
        ],
        [
            'title'     => 'Custom',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_CUSTOM,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_CUSTOM
        ],
        [
            'title'     => 'grid',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_GRID,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_GRID
        ],
        [
            'title'     => 'selector',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_SELECTOR,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_SELECTOR
        ],
        [
            'title'     => 'report',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_REPORT,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_REPORT
        ],
        [
            'title'     => 'fixed_columns',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_FIXED,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_FIXED
        ],
        [
            'title'     => 'tree',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_TREE,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_TREE
        ],
        // Grids -- Movie
        [
            'title'     => 'movie',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_MOVIE_COMING,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_MOVIE_COMING
        ],

        [
            'title'     => 'movie',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_MOVIE_COMING,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_MOVIE_COMING
        ],
        [
            'title'     => 'movie_in_theatre',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_MOVIE_IN_THEATRE,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_MOVIE_IN_THEATRE

        ],
        [
            'title'     => 'movie_top',
            'icon' => 'fa-bars',
            'uri'       => self::GRIDS_MOVIE_TOP,
            'parent' => 'Grids',
            'permission_slug' => self::PERMISSION_GRIDS_MOVIE_TOP
        ],
        //Basic
        [
            'title'     => 'Basic',
            'icon' => 'fa-bars',
            'uri'       => '/empty',
            'parent' => 'Demos',
            'permission_slug' => self::PERMISSION_BASIC
        ],
        [
            'title'     => 'basic_structure',
            'icon' => 'fa-bars',
            'uri'       => self::BASIC,
            'parent' => 'Basic',
            'permission_slug' => self::PERMISSION_STUCTURE
        ],
        [
            'title'     => 'Clients',
            'icon' => 'fa-bars',
            'uri'       => self::CLIENTS,
            'parent' => 'Basic',
            'permission_slug' => self::PERMISSION_CLIENTS
        ],
        [
            'title'     => 'layout',
            'icon' => 'fa-bars',
            'uri'       => self::LAYOUT,
            'parent' => 'Basic',
            'permission_slug' => self::PERMISSION_LAYOUT
        ],
        // Forms
        [
            'title'     => 'Forms',
            'icon' => 'fa-bars',
            'uri'       => '/empty',
            'parent' => 'Demos',
            'permission_slug' => self::PERMISSION_FORMS
        ],
        // Forms - Basic Forms
        [
            'title'     => 'when',
            'icon' => 'fa-bars',
            'uri'       => self::FORMS_WHEN,
            'parent' => 'Forms',
            'permission_slug' => self::PERMISSION_FORMS_WHEN
        ],
        [
            'title'     => 'step',
            'icon' => 'fa-bars',
            'uri'       => self::FORMS_STEP,
            'parent' => 'Forms',
            'permission_slug' => self::PERMISSION_FORMS_STEP
        ],
        [
            'title'     => 'form',
            'icon' => 'fa-bars',
            'uri'       => self::FORMS_FORM,
            'parent' => 'Forms',
            'permission_slug' => self::PERMISSION_FORMS_FORM
        ],
        // Forms - Editors
        [
            'title'     => 'Editors',
            'icon' => 'fa-bars',
            'uri'       => '/empty',
            'parent' => 'Demos',
            'permission_slug' => self::PERMISSION_EDITORS
        ],
        [
            'title'     => 'markdown',
            'icon' => 'fa-bars',
            'uri'       => self::EDITORS_MARKDOWN,
            'parent' => 'Editors',
            'permission_slug' => self::PERMISSION_EDITORS_MARKDOWN
        ],

        [
            'title'     => 'summercode',
            'icon' => 'fa-bars',
            'uri'       => self::EDITORS_SUMMERCODE,
            'parent' => 'Editors',
            'permission_slug' => self::PERMISSION_EDITORS_SUMMERCODE
        ],
        [
            'title'     => 'tinymce',
            'icon' => 'fa-bars',
            'uri'       => self::EDITORS_TINYMCE,
            'parent' => 'Editors',
            'permission_slug' => self::PERMISSION_EDITORS_TINYMCE
        ]
    ];

    protected array $permissions = [
        [
            'slug' => self::PERMISSION_DEMOS,
            'name' => 'Manager Demos',
            'path' => './empty',
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_DASHBOARDS,
            'name' => 'Manager Demos Dashboards',
            'path' => self::DASHBOARDS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_DASHBOARD_ANALYTIC,
            'name' => 'Manager Demos Analitics',
            'path' => self::DASHBOARD_ANALYTIC,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_DASHBOARD_PROP,
            'name' => 'Manager Demos Prop',
            'path' => self::DASHBOARD_PROP,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS,
            'name' => 'Manager Demos Components',
            'path' => self::COMPONENTS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_ACCORDION,
            'name' => 'Manager Demos Accordion',
            'path' => self::COMPONENTS_ACCORDION,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_ALERTS,
            'name' => 'Manager Demos Alerts',
            'path' => self::COMPONENTS_ALERTS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_BADGE_DOT,
            'name' => 'Manager Demos badge Dot',
            'path' => self::COMPONENTS_BADGE_DOT,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_CHECK_AND_RADIO,
            'name' => 'Manager Demos Check and Radio',
            'path' => self::COMPONENTS_CHECK_AND_RADIO,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_DROPDOWN,
            'name' => 'Manager Demos Dropdown',
            'path' => self::COMPONENTS_DROPDOWN,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_PROGRESS,
            'name' => 'Manager Demos Progress',
            'path' => self::COMPONENTS_PROGRESS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_TIP_AND_POPOVER,
            'name' => 'Manager Demos Tips',
            'path' => self::COMPONENTS_TIP_AND_POPOVER,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_TOASTR,
            'name' => 'Manager Demos Toastr',
            'path' => self::COMPONENTS_TOASTR,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_TABS,
            'name' => 'Manager Demos Tabs',
            'path' => self::COMPONENTS_TABS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_MODAL,
            'name' => 'Manager Demos Modal',
            'path' => self::COMPONENTS_MODAL,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_CARDS,
            'name' => 'Manager Demos Cards',
            'path' => self::COMPONENTS_CARDS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_MARKDOWN,
            'name' => 'Manager Demos markdown',
            'path' => self::COMPONENTS_MARKDOWN,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_CHARTS,
            'name' => 'Manager Demos Charts',
            'path' => self::COMPONENTS_CHARTS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_TABLE,
            'name' => 'Manager Demos Tables',
            'path' => self::COMPONENTS_TABLE,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_COMPONENTS_LOADING,
            'name' => 'Manager Demos Loading',
            'path' => self::COMPONENTS_LOADING,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS,
            'name' => 'Manager Demos Grids',
            'path' => self::GRIDS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_CUSTOM,
            'name' => 'Manager Demos Grids Custom',
            'path' => self::GRIDS_CUSTOM,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_GRID,
            'name' => 'Manager Demos Grids Grid',
            'path' => self::GRIDS_GRID,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_SELECTOR,
            'name' => 'Manager Demos Grids Selector',
            'path' => self::GRIDS_SELECTOR,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_REPORT,
            'name' => 'Manager Demos Grids Reports',
            'path' => self::GRIDS_REPORT,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_FIXED,
            'name' => 'Manager Demos Grids Fixed',
            'path' => self::GRIDS_FIXED,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_TREE,
            'name' => 'Manager Demos Grids Tree',
            'path' => self::GRIDS_TREE,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_BORDER_TABLE,
            'name' => 'Manager Demos Grids Border',
            'path' => self::GRIDS_BORDER_TABLE,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_MOVIE_COMING,
            'name' => 'Manager Demos Grids Comming',
            'path' => self::GRIDS_MOVIE_COMING,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_MOVIE_IN_THEATRE,
            'name' => 'Manager Demos Grids IN threatre',
            'path' => self::GRIDS_MOVIE_IN_THEATRE,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_GRIDS_MOVIE_TOP,
            'name' => 'Manager Demos Grids Top',
            'path' => self::GRIDS_MOVIE_TOP,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_EDITORS,
            'name' => 'Manager Demos Editors',
            'path' => self::EDITORS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_EDITORS_MARKDOWN,
            'name' => 'Manager Demos Editors Markdown',
            'path' => self::EDITORS_MARKDOWN,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_EDITORS_SUMMERCODE,
            'name' => 'Manager Demos Editors Summernote',
            'path' => self::EDITORS_SUMMERCODE,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_EDITORS_TINYMCE,
            'name' => 'Manager Demos Editors Tinymce',
            'path' => self::EDITORS_TINYMCE,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_FORMS,
            'name' => 'Manager Demos Forms',
            'path' => self::FORMS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_FORMS_WHEN,
            'name' => 'Manager Demos Forms When',
            'path' => self::FORMS_WHEN,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_FORMS_STEP,
            'name' => 'Manager Demos Forms Step',
            'path' => self::FORMS_STEP,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_FORMS_FORM,
            'name' => 'Manager Demos Forms Form',
            'path' => self::FORMS_FORM,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_BASIC,
            'name' => 'Manager Demos Basic',
            'path' => self::BASIC,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_STUCTURE,
            'name' => 'Manager Demos Structure',
            'path' => self::CLIENTS,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_LAYOUT,
            'name' => 'Manager Demos Layout',
            'path' => self::LAYOUT,
        ],
        [
            'parent' => self::PERMISSION_DEMOS,
            'slug' => self::PERMISSION_CLIENTS,
            'name' => 'Manager Demos Clients',
            'path' => self::CLIENTS,
        ],
    ];
    public function settingForm()
    {
        return new Setting($this);
    }

    public function init()
    {
        parent::init();
    }
}
