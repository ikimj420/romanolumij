<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lexicon;
use Illuminate\Http\Request;

class LexiconsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        //SEO
        $this->setSeo(__('app.lexicon'), 'Lexicons Page Latest Lexicons With Rom Serbian And English Word');

        $lexicons = Lexicon::latest()->paginate(36);
        $categories = Category::get();

        return view('lexicons.index', compact('lexicons', 'categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        Lexicon::create($this->validateRequest());

        return redirect(route('lexicon.index'))->withToastSuccess('Word Created Successfully!');
    }

    public function show(Lexicon $lexicon)
    {
        //SEO
        $this->setSeo( $lexicon->rom, $lexicon->eng);

        $categories = Category::get();

        return view('lexicons.show', compact('lexicon', 'categories'));
    }

    public function showByCategory($lexicon)
    {
        //SEO
        $this->setSeo(__('app.lexicon'), 'Lexicon Page Latest Lexicon Show By Category');

        $lexicons = Lexicon::with('category')->where('category_id', '=', $lexicon)->paginate(12);

        return view('lexicons.showByCategory', compact('lexicons'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, Lexicon $lexicon)
    {
        //update history
        $lexicon->update($this->validateRequest());

        return redirect(route('lexicon.index'))->withToastSuccess('Word Updated Successfully!');
    }

    public function destroy(Lexicon $lexicon)
    {
        //delete history
        $lexicon->delete();

        return redirect(route('lexicon.index'))->withToastSuccess('Word Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'rom' => 'required',
            'ser' => 'sometimes',
            'eng' => 'sometimes',
            'category_id' => 'sometimes',
        ]);
    }
}
