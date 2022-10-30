<?php
namespace App\Http\Controllers\Backend\Rates;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Rates\ManageRatesRequest;
use App\Repositories\Backend\RatesRepository;
// use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class RatesTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\RatesRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\RatesRepository $repository
     */
    public function __construct(RatesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Rates\ManageRatesRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRatesRequest $request)
    {
        //return Datatables::of($this->repository->getForDataTable())->make(true);
        return Datatables::of($this->repository->getForDataTable())
            // ->escapeColumns(['partner_name'])
            // ->editColumn('partner_email', function ($rate) {
            //     return $rate->partner_email_label;
            // })
            // ->editColumn('rate_name', function ($rate) {
            //     return $rate->rate_name_label;
            // })
            ->addColumn('actions', function ($rate) {
                return $rate->action_buttons;
            })
            ->escapeColumns(['name'])
            ->make(true);
    }
}
