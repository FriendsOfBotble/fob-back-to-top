<?php

namespace Botble\BackToTop\Providers;

use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;

class BackToTopServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/fob-back-to-top')
            ->loadAndPublishViews();

        $this->app->booted(function () {
            add_filter(THEME_FRONT_FOOTER, function (?string $html): string {
                return $html . view('plugins/fob-back-to-top::back-to-top-button')->render();
            }, 15);
        });
    }
}
