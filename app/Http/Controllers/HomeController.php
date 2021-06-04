<?php

namespace App\Http\Controllers;

use App\DataTables\User\TripDatatable;
use Illuminate\Http\Request;
use App\Models\Driver;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $trips = new TripDatatable($id);
        return $trips->render('user.trips.index');
    }

    public function create()
    {

        $drivers = Driver::where('id', auth()->user()->office_id)->get();
        // $selectedID = Office::first();
        return view('user.trips.create', compact('drivers'));
    }

    public function createFixed()
    {

        $drivers = Driver::where('id', auth()->user()->office_id)->get();
        // $selectedID = Office::first();
        return view('user.trips.fixed', compact('drivers'));
    }


}
