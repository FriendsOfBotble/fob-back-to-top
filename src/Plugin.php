<?php

namespace Botble\BackToTop;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Facades\Setting;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Setting::delete([
            'back_to_top_enabled',
            'back_to_top_position_bottom',
            'back_to_top_position_right',
        ]);
    }
}
