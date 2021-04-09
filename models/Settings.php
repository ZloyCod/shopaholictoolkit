<?php namespace Catdesign\ShopaholicToolkit\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'catdesign_shopaholic_toolkit_settings';

    public $settingsFields = 'fields.yaml';
}
