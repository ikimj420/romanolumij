<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        //validation
        $request->validate([
            'alav' => 'required',
            'title' => 'required',
            'istorija' => 'required',
            'history' => 'required',
        ]);

        History::create($request->all());

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
        $request->validate([
            'alav' => 'required',
            'title' => 'required',
            'istorija' => 'required',
            'history' => 'required',
        ]);

        //update history
        $history->update($request->all());

        return redirect(route('history.index'))->withToastSuccess('History Updated Successfully!');
    }

    public function destroy(History $history)
    {
        //delete history
        $history->delete();

        return redirect(route('history.index'))->withToastSuccess('History Deleted Successfully!');
    }
}
