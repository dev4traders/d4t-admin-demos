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

    const URL_HELPERS_SCAFFOLD = 'helpers/scaffold';

    const PERMISSION_HELPERS = 'mng.helpers';
    const PERMISSION_HELPERS_SCAFFOLD = 'mng.helpers_scaffold';

    protected $menu = [
        [
            'title' => 'Demos',
            'uri' => '/empty',
            'icon' => 'fa-folder-open',
            'permission_slug' => self::PERMISSION_HELPERS
        ],
        [
            'parent' => 'Demos',
            'title' => 'Scaffold',
            'uri' => self::URL_HELPERS_SCAFFOLD,
            'icon' => 'fa-fw fa-inbox',
            'permission_slug' => self::PERMISSION_HELPERS_SCAFFOLD
        ],
        [
            'parent' => 'Demos',
            'title' => 'Icons',
            'uri' => self::URL_HELPERS_ICONS,
            'icon' => 'fa-fw fa-inbox',
            'permission_slug' => self::PERMISSION_HELPERS_ICONS
        ],
    ];

    protected array $permissions = [
        [
            'slug' => self::PERMISSION_HELPERS,
            'name' => 'Manager Demos',
            'path' => './empty',
        ],
        [
            'parent' => self::PERMISSION_HELPERS,
            'slug' => self::PERMISSION_HELPERS_SCAFFOLD,
            'name' => 'Manager Demos Scaffold',
            'path' => self::URL_HELPERS_SCAFFOLD,
        ],
        [
            'parent' => self::PERMISSION_HELPERS,
            'slug' => self::PERMISSION_HELPERS_ICONS,
            'name' => 'Manager Demos Icons',
            'path' => self::URL_HELPERS_ICONS,
        ],
    ];
    public function settingForm()
    {
        return new Setting($this);
    }

    public function init()
    {
        parent::init();

//        $this->loadConfig();
    }

    // public function loadConfig()
    // {
    //     // $this->publishes([
    //     //     __DIR__ . '/../config/helpers.php' => config_path('helpers.php')
    //     // ], 'config');
    // }
}
