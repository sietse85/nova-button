<?php

namespace Sietse85\NovaButton\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ButtonClick
{
    use Dispatchable;

    public $resource;

    public ?string $key;

    public function __construct($resource, ?string $key)
    {
        $this->resource = $resource;
        $this->key = $key;
    }
}
