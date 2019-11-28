<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use App\Models\Story;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $poems = Poem::latest()->take(3)->get();
        $stories = Story::latest()->take(3)->get();

        return view('welcome', compact('poems', 'stories'));
    }
}
