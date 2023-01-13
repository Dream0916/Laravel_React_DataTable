<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SendEmailJob;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class VoyagerHeroController extends VoyagerBaseController
{
    // POST BR(E)AD
    /**
     * @throws AuthorizationException
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        //Validate fields
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

        $data->permissions()->sync($request->input('weapons', []));

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_updated')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
    }

    // POST BRE(A)D

    /**
     * @throws AuthorizationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        //Validate fields
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();

        $data = new $dataType->model_name();
        $this->insertUpdateData($request, $slug, $dataType->addRows, $data);

        $data->permissions()->sync($request->input('weapons', []));

        // App should send letter to admin ( mailto:admin@test.com ) when new hero will be created (implement with queue)
        try{
            $details['email'] = 'admin@test.com';
            dispatch(new SendEmailJob($details));
        }
        catch(Exception $e){

        }

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
    }
}
