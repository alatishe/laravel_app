<?php
namespace App\Http\Controllers\Backend\Carriers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Carriers\ManageCarriersRequest;
use App\Repositories\Backend\CarriersRepository;
// use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ShippingCarriersTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\CarriersRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\CarriersRepository $repository
     */
    public function __construct(CarriersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Carriers\ManageCarriersRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCarriersRequest $request)
    {
        //return Datatables::of($this->repository->getForDataTable())->make(true);
        return Datatables::of($this->repository->getForDataTable())
            // ->escapeColumns(['partner_name'])
            // ->editColumn('partner_email', function ($carrier) {
            //     return $carrier->partner_email_label;
            // })
            // ->editColumn('carrier_name', function ($carrier) {
            //     return $carrier->carrier_name_label;
            // })
            ->addColumn('actions', function ($carrier) {
                return $carrier->action_buttons;
            })
            ->escapeColumns(['name'])
            ->make(true);
    }
}
