<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use DB;

class MainController extends Controller
{
    public function index()
    {
       $sucess = Trip::select('type', \DB::raw("COUNT('id') as count"))
       ->groupBy('type')
       ->get();


       $all_works = Trip::count();


    //    dd($sucess);
    //    $sucess = $sucess->count() / $all_works;



           $works=Trip::select(
               DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->
               groupBy(DB::raw('MONTH(created_at)'))->pluck('count');
           ;
           $months=Trip::select(
           DB::raw("MONTH(created_at) as month"))->whereYear('created_at',date('Y'))->
           groupBy(DB::raw('MONTH(created_at)'))->pluck('month');

           $dates=array(0,0,0,0,0,0,0,0,0,0,0,0);
           foreach($months as $index=>$month)
           {

           $dates[$month]=$works[$index];

           }


               return view('admin.home',compact('dates','sucess'));

           }

}
