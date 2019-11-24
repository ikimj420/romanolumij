<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{

    public function index()
    {
        return view('histories.index');
    }

    public function create()
    {
        return view('histories.create');
    }

    public function store(Request $request)
    {
        //validate data and create without pics
        $history = History::create($this->validateRequest());
        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'history';
        $pics = $this->createImage($img_request, $img, $folder);
        $history->pics = $pics;
        //save history
        $history->save();
        return redirect(route('history.index'))->with('success','History Created Successfully!');
    }

    public function show(History $history)
    {
        //
    }

    public function edit(History $history)
    {
        //
    }

    public function update(Request $request, History $history)
    {
        //
    }

    public function destroy(History $history)
    {
        //
    }

    private function validateRequest()
    {
        return request()->validate([
            'alav' => 'required',
            'title' => 'required',
            'istorija' => 'required',
            'history' => 'required',

            'pics' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }
}
