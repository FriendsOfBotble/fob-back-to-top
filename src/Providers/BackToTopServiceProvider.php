<?php

namespace Botble\BackToTop\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\DashboardMenu as DashboardMenuSupport;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;

class BackToTopServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/fob-back-to-top')
            ->loadAndPublishViews()
            ->loadAndPublishConfigurations(['permissions'])
            ->loadRoutes()
            ->loadAndPublishTranslations();

        DashboardMenu::beforeRetrieving(static function (DashboardMenuSupport $dashboardMenu) {
            $dashboardMenu
                ->registerItem([
                    'id' => 'cms-plugins-back-to-top',
                    'priority' => 9990,
                    'parent_id' => null,
                    'name' => 'plugins/fob-back-to-top::back-to-top.name',
                    'icon' => 'ti ti-arrow-up',
                    'url' => fn () => route('back-to-top.settings'),
                    'permissions' => ['back-to-top.settings'],
                ]);

        });

        $this->app->booted(function () {
            add_filter(THEME_FRONT_FOOTER, function (?string $html): string {
                if (! setting('back_to_top_enabled', true)) {
                    return $html;
                }

                return $html . view('plugins/fob-back-to-top::back-to-top-button')->render();
            }, 15);
        });
    }
}
