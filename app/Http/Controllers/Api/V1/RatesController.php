<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Backend\Rates\DeleteRatesRequest;
use App\Http\Requests\Backend\Rates\ManageRatesRequest;
use App\Http\Requests\Backend\Rates\StoreRatesRequest;
use App\Http\Requests\Backend\Rates\UpdateRatesRequest;
use App\Http\Resources\RatesResource;
use App\Models\Rate;
use App\Repositories\Backend\RatesRepository;
use Illuminate\Http\Response;

/**
 * @group Rate Management
 *
 * Class RatesController
 *
 * APIs for Rate Management
 *
 * @authenticated
 */
class RatesController extends APIController
{
    /**
     * Repository.
     *
     * @var RatesRepository
     */
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(RatesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all Rate.
     *
     * This endpoint provides a paginated list of all rates. You can customize how many records you want in each
     * returned response as well as sort records based on a key in specific order.
     *
     * @queryParam page Which page to show. Example: 12
     * @queryParam per_page Number of records per page. (use -1 to retrieve all) Example: 20
     * @queryParam order_by Order by database column. Example: created_at
     * @queryParam order Order direction ascending (asc) or descending (desc). Example: asc
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/rate/rate-list.json
     *
     * @param ManageRatesRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ManageRatesRequest $request)
    {
        $collection = $this->repository->retrieveList($request->all());

        return RatesResource::collection($collection);
    }

    /**
     * Gives a specific Rate.
     *
     * This endpoint provides you a single Rate
     * The Rate is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Rate
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/rate/rate-show.json
     *
     * @param ManageRatesRequest $request
     * @param \App\Models\Rate $rate
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ManageRatesRequest $request, Rate $rate)
    {
        return new RatesResource($rate);
    }

    /**
     * Create a new Rate.
     *
     * This endpoint lets you create new Rate
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile status=201 responses/rate/rate-store.json
     *
     * @param \App\Http\Requests\Backend\Rates\StoreRatesRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRatesRequest $request)
    {
        return (new RatesResource($this->repository->create($request->validated())))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update Rate.
     *
     * This endpoint allows you to update existing Rate with new data.
     * The Rate to be updated is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Rate
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/rate/rate-update.json
     *
     * @param \App\Models\Rate $rate
     * @param \App\Http\Requests\Backend\Rates\UpdateRatesRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRatesRequest $request, Rate $rate)
    {
        $rate = $this->repository->update($rate, $request->validated());

        return new RatesResource($rate);
    }

    /**
     * Delete Rate.
     *
     * This endpoint allows you to delete a Rate
     * The Rate to be deleted is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Rate
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile status=204 scenario="When the record is deleted" responses/rate/rate-destroy.json
     *
     * @param \App\Models\Rate $rate
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteRatesRequest $request, Rate $rate)
    {
        $this->repository->delete($rate);

        return response()->noContent();
    }
}
