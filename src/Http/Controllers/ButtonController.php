<?php

namespace Sietse85\NovaButton\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\ResolvedFields;
use Laravel\Nova\Http\Requests\ActionRequest;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Actions\DispatchAction;

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
        $event = $request->get('event');
        $resource = $request->findModelQuery()->firstOrFail();

        event(new $event($resource, $request->get('buttonKey')));

        return response('ok', 200);
    }

    /**
     * Trigger action
     *
     * @param NovaRequest $request
     * @return JsonResponse
     */
    public function triggerAction(NovaRequest $request): JsonResponse
    {
        $actionClass = $request->get('actionClass');
        $resourceId = $request->get('resourceId');
        $model = $request->get('model');
        $result = $model::find($resourceId);

        $action = new $actionClass;
        $actionFields = new ActionFields(collect(), collect());
        $action->handle($actionFields, collect($result));

        return new JsonResponse([], 200);
    }
}
