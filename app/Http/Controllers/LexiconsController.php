<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lexicon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LexiconsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'showByCategory');
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
        //validate save album
        $validator = Validator::make($request->all(), [
            'rom' => 'required',
            'ser' => 'sometimes',
            'eng' => 'sometimes',
            'category_id' => 'sometimes',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $lexicon = new Lexicon();

        $lexicon->rom = htmlspecialchars($request->rom);
        $lexicon->ser = htmlspecialchars($request->ser);
        $lexicon->eng = htmlspecialchars($request->eng);
        $lexicon->category_id = $request->category_id;

        $lexicon->save();

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

    public function update(Request $request, $id)
    {
        //validate save lexicon
        $validator = Validator::make($request->all(), [
            'rom' => 'required',
            'ser' => 'sometimes',
            'eng' => 'sometimes',
            'category_id' => 'sometimes',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $lexicon = Lexicon::findOrFail($id);

        $lexicon->rom = htmlspecialchars($request->rom);
        $lexicon->ser = htmlspecialchars($request->ser);
        $lexicon->eng = htmlspecialchars($request->eng);
        $lexicon->category_id = $request->category_id;

        $lexicon->update();

        return redirect(route('lexicon.index'))->withToastSuccess('Word Updated Successfully!');
    }

    public function destroy(Lexicon $lexicon)
    {
        //delete lexicon
        $lexicon->delete();

        return redirect(route('lexicon.index'))->withToastSuccess('Word Deleted Successfully!');
    }
}
