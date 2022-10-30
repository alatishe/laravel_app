<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Backend\Carriers\DeleteCarriersRequest;
use App\Http\Requests\Backend\Carriers\ManageCarriersRequest;
use App\Http\Requests\Backend\Carriers\StoreCarriersRequest;
use App\Http\Requests\Backend\Carriers\UpdateCarriersRequest;
use App\Http\Resources\CarriersResource;
use App\Models\Carrier;
use App\Repositories\Backend\CarriersRepository;
use Illuminate\Http\Response;

/**
 * @group Carrier Management
 *
 * Class CarriersController
 *
 * APIs for Carrier Management
 *
 * @authenticated
 */
class CarriersController extends APIController
{
    /**
     * Repository.
     *
     * @var CarriersRepository
     */
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(CarriersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all Carrier.
     *
     * This endpoint provides a paginated list of all carriers. You can customize how many records you want in each
     * returned response as well as sort records based on a key in specific order.
     *
     * @queryParam page Which page to show. Example: 12
     * @queryParam per_page Number of records per page. (use -1 to retrieve all) Example: 20
     * @queryParam order_by Order by database column. Example: created_at
     * @queryParam order Order direction ascending (asc) or descending (desc). Example: asc
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/carrier/carrier-list.json
     *
     * @param ManageCarriersRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ManageCarriersRequest $request)
    {
        $collection = $this->repository->retrieveList($request->all());

        return CarriersResource::collection($collection);
    }

    /**
     * Gives a specific Carrier.
     *
     * This endpoint provides you a single Carrier
     * The Carrier is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Carrier
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/carrier/carrier-show.json
     *
     * @param ManageCarriersRequest $request
     * @param \App\Models\Carrier $carrier
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ManageCarriersRequest $request, Carrier $carrier)
    {
        return new CarriersResource($carrier);
    }

    /**
     * Create a new Carrier.
     *
     * This endpoint lets you create new Carrier
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile status=201 responses/carrier/carrier-store.json
     *
     * @param \App\Http\Requests\Backend\Carriers\StoreCarriersRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCarriersRequest $request)
    {
        return (new CarriersResource($this->repository->create($request->validated())))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update Carrier.
     *
     * This endpoint allows you to update existing Carrier with new data.
     * The Carrier to be updated is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Carrier
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/carrier/carrier-update.json
     *
     * @param \App\Models\Carrier $carrier
     * @param \App\Http\Requests\Backend\Carriers\UpdateCarriersRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCarriersRequest $request, Carrier $carrier)
    {
        $carrier = $this->repository->update($carrier, $request->validated());

        return new CarriersResource($carrier);
    }

    /**
     * Delete Carrier.
     *
     * This endpoint allows you to delete a Carrier
     * The Carrier to be deleted is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Carrier
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile status=204 scenario="When the record is deleted" responses/carrier/carrier-destroy.json
     *
     * @param \App\Models\Carrier $carrier
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteCarriersRequest $request, Carrier $carrier)
    {
        $this->repository->delete($carrier);

        return response()->noContent();
    }
}
