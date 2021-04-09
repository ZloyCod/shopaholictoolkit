<?php namespace Catdesign\ShopaholicToolkit;

use Backend;
use System\Classes\PluginBase;

/**
 * ShopaholicToolkit Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Дополнительные инструменты',
            'description' => 'Добавляет дополнительные функции для плагина Shopaholic',
            'author'      => 'Catdesign',
            'icon'        => 'icon-magic'
        ];
    }


    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'catdesign.shopaholic_toolkit.controls' => [
                'tab' => 'Дополнительные инструменты Shopaholic',
                'label' => 'Управление возможностями плагина'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'shopaholic_toolkit' => [
                'label'       => 'Дополнительные настройки Shopaholic',
                'description' => 'Предоставляет дополнительные функции для плагина Shopaholic',
                'category'    => 'lovata.shopaholic::lang.tab.settings',
                'icon'        => 'icon-magic',
                'class'       => 'Catdesign\ShopaholicToolkit\Models\Settings',
                'order'       => 500,
                'keywords'    => 'security location',
                'permissions' => ['catdesign.shopaholic_toolkit.controls']
            ]
        ];
    }
}
