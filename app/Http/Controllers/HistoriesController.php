<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        //SEO
        $this->setSeo(__('app.history'), 'History Page Small Part Of Rom History Origin Flag Anthem');

        $histories = History::latest()->get();
        return view('histories.index', compact('histories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save history
        $validator = Validator::make($request->all(), [
            'alav' => 'required',
            'title' => 'required',
            'istorija' => 'required',
            'history' => 'required',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $history = new History;

        $history->alav = htmlspecialchars($request->alav);
        $history->title = htmlspecialchars($request->title);
        $history->istorija = $request->istorija;
        $history->history = $request->history;

        $history->save();

        return redirect(route('history.index'))->withToastSuccess('History Created Successfully!');
    }

    public function show(History $history)
    {
        //SEO
        $this->setSeo('Rom History', 'History Page Small Part Of Rom History Origin Flag Anthem');

        return view('histories.show', compact('history'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $history)
    {
        //validate update history
        $validator = Validator::make($request->all(), [
            'alav' => 'required',
            'title' => 'required',
            'istorija' => 'required',
            'history' => 'required',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $history = History::findOrFail($history);

        $history->alav = htmlspecialchars($request->alav);
        $history->title = htmlspecialchars($request->title);
        $history->istorija = $request->istorija;
        $history->history = $request->history;

        $history->update();


        return redirect(route('history.index'))->withToastSuccess('History Updated Successfully!');
    }

    public function destroy(History $history)
    {
        //delete history
        $history->delete();

        return redirect(route('history.index'))->withToastSuccess('History Deleted Successfully!');
    }
}
