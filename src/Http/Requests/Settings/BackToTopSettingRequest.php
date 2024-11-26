<?php

namespace Botble\BackToTop\Http\Requests\Settings;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;

class BackToTopSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'back_to_top_enabled' => new OnOffRule(),
            'back_to_top_position_bottom' => ['required', 'integer', 'min:0', 'max:1000'],
            'back_to_top_position_right' => ['required', 'integer', 'min:0', 'max:1000'],
        ];
    }
}
