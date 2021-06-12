<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training = Training::orderBy('id', 'desc')->get();
        return view('Backend.Trainings.view', compact('training'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Trainings.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'training_title' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'trained_at' => 'required',
        ]);
        $training = new Training([
            'training_title' => $request->training_title,
            'trained_at' => $request->trained_at,
            'year' => $request->year,
            'duration' => $request->duration,
        ]);
        $data = $training->save();
        if ($data) {
            return redirect()->route('training.index')->with('success', 'Training details added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $training = Training::findorfail($id);
        return view('Backend.Trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);
        $request->validate([
            'training_title' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'trained_at' => 'required',
        ]);
        $training->training_title = $request->training_title;
        $training->duration = $request->duration;
        $training->year = $request->year;
        $training->trained_at = $request->trained_at;
        $update = $training->save();
        if ($update) {
            return redirect()->route('training.index')->with('success', 'Training details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($training)
    {
        $training = Training::find($training);
        $training->delete();
        return redirect()->route('training.index')->with('warning', 'Deleted Successfully');
    }
}
