<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function indexv()
    {
        return view('index');
    }
    public function history()
    {
        return view('history');
    }



    public function index()
    {
        return view('welcome');
    }
}
