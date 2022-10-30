<?php

namespace App\Http\Controllers\Backend\Rates;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Rates\ManageRatesRequest;
use Illuminate\Http\Request;  
use DB; 
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Rate;
use App\Repositories\Backend\RatesRepository;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class RatesController extends Controller
{
    /**
     * @var \App\Repositories\Backend\RatesRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\RatesRepository $rate
     */
    public function __construct(RatesRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['rates']);
    }

    /**
     * @param \App\Http\Requests\Backend\Rates\ManageRatesRequest $request
     *
     * @return ViewResponse
     */
    public function index(ManageRatesRequest $request)
    {
        return new ViewResponse('backend.rates.index');
    }

    public function upload(ManageRatesRequest $request)
    {
        // print_r($_FILES);
        if($request->hasFile('import_csv')){ 
            $csvFile = fopen($_FILES['import_csv']['tmp_name'], 'r');
            //$i = 1;
            // DB::table('rates')->truncate();
            $header = fgetcsv($csvFile);
            $countheader= count($header);
            if($countheader!=1){   
                $csvFiles = fopen($_FILES['import_csv']['tmp_name'], 'r');
                $i = 1;
                

                while(($line = fgetcsv($csvFiles)) !== FALSE){
                    // print_r($line);
                    if($i > 1){
                        $data = array(
                            'option_name'=>$line[0],
                            'upper_weight'=>$line[1],
                            'lower_weight' => $line[2],
                            'upper_height'=>$line[3],
                            'lower_height' => $line[4],
                            'upper_width' => $line[5],
                            'lower_width' => $line[6],
                            'price' => $line[7]
                        );
                        // DB::table('test_group')->insert($data);
                        $insertGetId = DB::table('rates')->insertGetId($data);
                    }
                $i++;
                }
                
                fclose($csvFile);
                return new RedirectResponse(route('admin.rates.index'), ['flash_success' => __('alerts.backend.rates.created')]);
            }else{
                //Print Error;
                return new RedirectResponse(route('admin.rates.index'), ['flash_danger' => __('alerts.backend.rates.error')]);
            }

           
        }else{
            //Print Blank Page
            return new RedirectResponse(route('admin.rates.index'), ['flash_danger' => __('alerts.backend.rates.blank')]);  
        }
        
    }

    public function get(ManageRatesRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())->make(true);
    }

    public function listnew()
    {
        return Datatables::of($this->repository->getForDataTable())->make(true);
    }

    
}
