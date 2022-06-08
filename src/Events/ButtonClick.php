<?php

namespace Sietse85\NovaButton\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ButtonClick
{
    use Dispatchable;

    public string $resource;

    public string $key;

    public function __construct(string $resource, ?string $key)
    {
        $this->resource = $resource;
        $this->key = $key;
    }
}
