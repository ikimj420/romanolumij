<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Lexicon;
use App\Models\Poem;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        //SEO
        $this->setSeo(__('app.welcome'), 'Welcome Page Latest Poems Stories Lexicons Albums Language Rom Serbian English');

        $poems = Poem::latest()->take(4)->get();
        $stories = Story::latest()->take(4)->get();
        $lexicons = Lexicon::latest()->take(4)->get();
        $albums = Album::latest()->take(4)->get();

        return view('welcome', compact('poems', 'stories', 'lexicons', 'albums'));
    }
}
