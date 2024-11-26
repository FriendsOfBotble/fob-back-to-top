<?php

namespace Botble\BackToTop\Http\Controllers\Settings;

use Botble\BackToTop\Forms\Settings\BackToTopSettingForm;
use Botble\BackToTop\Http\Requests\Settings\BackToTopSettingRequest;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Setting\Http\Controllers\SettingController;

class BackToTopSettingController extends SettingController
{
    public function edit()
    {
        $this->pageTitle(trans('plugins/fob-back-to-top::back-to-top.name'));

        return BackToTopSettingForm::create()->renderForm();
    }

    public function update(BackToTopSettingRequest $request): BaseHttpResponse
    {
        return $this->performUpdate($request->validated());
    }
}
