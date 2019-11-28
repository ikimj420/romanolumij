<?php

namespace App\Http\Controllers;

use App\Models\Lexicon;
use App\Models\Poem;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $poems = Poem::latest()->take(3)->get();
        $stories = Story::latest()->take(3)->get();
        $lexicons = Lexicon::latest()->take(3)->get();

        return view('welcome', compact('poems', 'stories', 'lexicons'));
    }
}
