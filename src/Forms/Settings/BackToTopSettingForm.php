<?php

namespace Botble\BackToTop\Forms\Settings;

use Botble\BackToTop\Http\Requests\Settings\BackToTopSettingRequest;
use Botble\Base\Forms\FieldOptions\CheckboxFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\FieldOptions\RadioFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\OnOffCheckboxField;
use Botble\Base\Forms\Fields\RadioField;
use Botble\Base\Forms\Fields\RepeaterField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Setting\Forms\SettingForm;

class BackToTopSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setSectionTitle(trans('plugins/fob-back-to-top::back-to-top.name'))
            ->setSectionDescription(trans('plugins/fob-back-to-top::back-to-top.description'))
            ->setValidatorClass(BackToTopSettingRequest::class)
            ->add(
                'back_to_top_enabled',
                OnOffCheckboxField::class,
                CheckboxFieldOption::make()
                    ->label(trans('plugins/fob-back-to-top::back-to-top.enable'))
                    ->value($backToTopEnabled = setting('back_to_top_enabled', true))
            )
            ->addOpenCollapsible('back_to_top_enabled', '1', $backToTopEnabled == '1')
            ->add(
                'back_to_top_position_bottom',
                NumberField::class,
                NumberFieldOption::make()
                    ->label(trans('plugins/fob-back-to-top::back-to-top.position_bottom'))
                    ->helperText(trans('plugins/fob-back-to-top::back-to-top.position_bottom_helper'))
                    ->value(setting('back_to_top_position_bottom', 90))
            )
            ->add(
                'back_to_top_position_right',
                NumberField::class,
                NumberFieldOption::make()
                    ->label(trans('plugins/fob-back-to-top::back-to-top.position_right'))
                    ->helperText(trans('plugins/fob-back-to-top::back-to-top.position_right_helper'))
                    ->value(setting('back_to_top_position_right', 40))
            )
            ->addCloseCollapsible('back_to_top_enabled', '1');
    }
}
