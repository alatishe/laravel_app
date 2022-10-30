<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Responses\ViewResponse;
use Illuminate\Http\Request;  
use DB; 
use App\Repositories\Backend\RatesRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class CarrierController extends Controller
{

    protected $repository;
    /**
     * @param \App\Repositories\Backend\Auth\UserRepository $userRepository
     */
    public function __construct(ratesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index()
    {
        return new ViewResponse('backend.auth.carrier.index');
    }

    public function upload(\Illuminate\Http\Request $request)
    {
        //print_r($_FILES);
        $csvFile = fopen($_FILES['import_csv']['tmp_name'], 'r');
        $i = 1;
        DB::table('rates')->truncate();
        while(($line = fgetcsv($csvFile)) !== FALSE){
            //print_r($line);
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
                //DB::table('test_group')->insert($data);
                $insertGetId = DB::table('rates')->insertGetId($data);
            }
            $i++;
        }
        fclose($csvFile);
        return redirect('/admin/shipping-rates');
    }

    public function list(\Illuminate\Http\Request $request)
    {
        //print_r($_FILES);
        return Datatables::of($this->repository->getForDataTable())->make(true);
    }

    public function listnew()
    {
        //print_r($_FILES);
        return Datatables::of($this->repository->getForDataTable())->make(true);
    }
}
