<?php

namespace Sietse85\NovaButton;

use Laravel\Nova\Fields\Field;

class Button extends Field
{
    public $component = 'nova-button';

    public string $classes = '';

    public string $event = '';

}
