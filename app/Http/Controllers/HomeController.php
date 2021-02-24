<?php

namespace App\Http\Controllers;

use App\Library\Data\GetData;
use App\Models\Models\Data;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * Endpoint for data refresh in DB
     * @return Application|ResponseFactory|Response
     */
    public function refreshData()
    {
        return GetData::refresh();
    }

    /**
     * Endpoint for Returning Data from DB
     * @return Application|ResponseFactory|Response
     */
    public function getData()
    {
        return response(Data::all(), 200);
    }

    /**
     * Show the application dashboard.
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('home');
    }
}
