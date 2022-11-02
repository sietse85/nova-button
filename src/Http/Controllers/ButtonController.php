<?php

namespace Sietse85\NovaButton\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class ButtonController extends Controller
{
    /**
     * Handle request
     *
     * @param NovaRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function handle(NovaRequest $request)
    {
        $event = $request->get('event');
        $resource = $request->findModelQuery()->firstOrFail();

        event(new $event($resource, $request->route('buttonKey')));

        return response('ok', 200);
    }

    /**
     * Trigger action
     *
     * @param NovaRequest $request
     */
    public function triggerAction(NovaRequest $request)
    {
        $actionClass = $request->get('actionClass');
        $resourceId = $request->get('resourceId');
        $model = $request->get('model');
        $result = $model::find($resourceId);

        $action = new $actionClass;
        $actionFields = new ActionFields(collect(), collect());

        return $action->handle($actionFields, collect([$result]));
    }
}
