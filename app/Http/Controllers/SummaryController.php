<?php

namespace App\Http\Controllers;

use App\Models\Summary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function create()
    {
        $summary = Summary::first();
        // dd($summary == []);

        return view('Backend.Summary.summary', compact('summary'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'summary' => 'required|min:10 |max:100',
            'title' => 'required',
        ]);
        $summary = new Summary([
            'summary' => $request->summary,
            'title' => $request->title,
        ]);
        $data = $summary->save();
        if ($data) {
            return redirect()->back()->with('success', 'Summary added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }
    public function edit($id)
    {
        $summary = Summary::findOrFail($id);
        return back();
    }
    public function update(Request $request, $id)
    {
        $summary = Summary::findOrFail($id);
        $request->validate([
            'summary' => 'required|min:10 |max:100',
            'title' => 'required',
        ]);

        $summary->summary = $request->summary;
        $summary->title = $request->title;
        $update = $summary->save();
        if ($update) {
            return redirect()->back()->with('success', 'Summary details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }
}
