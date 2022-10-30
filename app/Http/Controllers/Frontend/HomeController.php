<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DB;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function option_name()
    {     
        $empls = DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->select('users.*')
            ->where('role_user.role_id', 4)
            ->get();   
        $html = '';
        if($empls->count()){
            $html .= '<ul class="option_name">';
            foreach($empls as $empl){
                $html .= '<li><label><input type="radio" value="'.$empl->email.'" name="option_name">'.$empl->first_name.' '.$empl->last_name.'</label></li>';
            }
            $html .= '</ul>';
        }
        echo $html;
    }

    public function carrier_name(\Illuminate\Http\Request $request)
    {        
        //if(!empty($_POST)){
            //if(isset($_POST['email'])){
                $empls = DB::table('carriers')->get(); 
                $html = '';
                if($empls->count()){
                    $html .= '<ul class="carrier_name" style="display:none;">';
                    foreach($empls as $empl){
                        $html .= '<li  data-email="'.$empl->partner_email.'"><label><input type="radio" value="'.$empl->carrier_name.'" name="carrier_name">'.$empl->carrier_name.'</label></li>';
                    }
                    $html .= '</ul>';
                }
                echo $html;
           // }
        //}
    }

    public function carrier_rates(\Illuminate\Http\Request $request)
    {        
        //if(!empty($_POST)){
            //if(isset($_POST['carrier_name'])){
                $empls = DB::table('rates')->get(); 
                $html = '';
                if($empls->count()){
                    $html .= '<ul class="carrier_rates" style="display:none;">';
                    foreach($empls as $empl){
                        $html .= '<li data-email="'.$empl->option_name.'"><label><input type="radio" value="'.$empl->price.'" name="carrier_rates">$ '.$empl->price.' [Weight: '.$empl->upper_weight.' Kg]</label></li>';
                    }
                    $html .= '</ul>';
                }
                echo $html;
            //}
       //}
    }
}
