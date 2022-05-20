<?php

namespace Sietse85\NovaButton\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;

class ButtonController extends Controller
{
    /**
     * Handle request
     *
     * @param NovaRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function handle(NovaRequest $request): Response|Application|ResponseFactory
    {
        $event = $request->event;
        $resource = $request->findModelQuery()->firstOrFail();

        event(new $event($resource, $request->buttonKey));

        return response('ok', 200);
    }
}
