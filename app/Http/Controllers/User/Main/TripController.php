<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\User\TripDatatable;
use Auth;
class TripController extends Controller
{
    public function index()
    {
        // $id = Auth::user()->id;
        // dd($id);
        $trips = new TripDatatable(1);
        return $trips->render('user.trips.index');
    }
}
