<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $histories = History::latest()->get();
        return view('histories.index', compact('histories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        History::create($this->validateRequest());

        return redirect(route('history.index'))->withToastSuccess('History Created Successfully!');
    }

    public function show(History $history)
    {

        return view('histories.show', compact('history'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, History $history)
    {
        //update history
        $history->update($this->validateRequest());

        return redirect(route('history.index'))->withToastSuccess('History Updated Successfully!');
    }

    public function destroy(History $history)
    {
        //delete history
        $history->delete();

        return redirect(route('history.index'))->withToastSuccess('History Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'alav' => 'required',
            'title' => 'required',
            'istorija' => 'required',
            'history' => 'required',
        ]);
    }
}
