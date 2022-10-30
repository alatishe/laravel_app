<?php

namespace App\Http\Controllers\Backend\Carriers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Carriers\CreateCarriersRequest;
use App\Http\Requests\Backend\Carriers\DeleteCarriersRequest;
use App\Http\Requests\Backend\Carriers\ManageCarriersRequest;
use App\Http\Requests\Backend\Carriers\StoreCarriersRequest;
use App\Http\Requests\Backend\Carriers\UpdateCarriersRequest;
use App\Http\Responses\Backend\Carriers\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Carrier;
use App\Repositories\Backend\CarriersRepository;
use Illuminate\Support\Facades\View;

class ShippingCarriersController extends Controller
{
    /**
     * @var \App\Repositories\Backend\CarriersRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\CarriersRepository $carrier
     */
    public function __construct(CarriersRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['carriers']);
    }

    /**
     * @param \App\Http\Requests\Backend\Carriers\ManageCarriersRequest $request
     *
     * @return ViewResponse
     */
    public function index(ManageCarriersRequest $request)
    {
        return new ViewResponse('backend.carriers.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Carriers\CreateCarriersRequest $request
     *
     * @return ViewResponse
     */
    public function create(CreateCarriersRequest $request)
    {
        
        return new ViewResponse('backend.carriers.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Carriers\StoreCarriersRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCarriersRequest $request)
    {
        //print_r($request); die(); 
        $this->repository->create($request->except('_token'));

        return new RedirectResponse(route('admin.carriers.index'), ['flash_success' => __('alerts.backend.carriers.created')]);
    }

    /**
     * @param \App\Models\Carriers $carriers
     * @param \App\Http\Requests\Backend\Carriers\ManageCarriersRequest $request
     *  
     * @return \App\Http\Responses\Backend\Carriers\EditResponse
     */
    public function edit(Carrier $carrier, ManageCarriersRequest $request)
    {
        return new EditResponse($carrier);
    }

    /**
     * @param \App\Models\Carriers $carriers
     * @param \App\Http\Requests\Backend\Carriers\UpdateCarriersRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Carrier $carrier, UpdateCarriersRequest $request)
    {
        $this->repository->update($carrier, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.carriers.index'), ['flash_success' => __('alerts.backend.carriers.updated')]);
    }

    /**
     * @param \App\Models\Carrier $carrier
     * @param \App\Http\Requests\Backend\Pages\DeleteCarrierRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Carrier $carrier, DeleteCarriersRequest $request)
    {
        $this->repository->delete($carrier);

        return new RedirectResponse(route('admin.carriers.index'), ['flash_success' => __('alerts.backend.carriers.deleted')]);
    }
}
