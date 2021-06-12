<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::orderBy('id', 'desc')->get();
        return view('Backend.Education.view', compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Education.add');
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
            'course' => 'required',
            'year' => 'required',
            'description' => 'required',
            'institute' => 'required',
        ]);
        $education = new Education([
            'course' => $request->course,
            'institute' => $request->institute,
            'year' => $request->year,
            'description' => $request->description,
        ]);
        $data = $education->save();
        if ($data) {
            return redirect()->route('education.index')->with('success', 'Education details added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $education = Education::findorfail($id);
        return view('Backend.Education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);
        $request->validate([
            'course' => 'required',
            'year' => 'required',
            'description' => 'required',
            'institute' => 'required',
        ]);
        $education->course = $request->course;
        $education->description = $request->description;
        $education->year = $request->year;
        $education->institute = $request->institute;
        $update = $education->save();
        if ($update) {
            return redirect()->route('education.index')->with('success', 'Education details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy($education)
    {
        $education = Education::find($education);
        $education->delete();
        return redirect()->route('education.index')->with('warning', 'Deleted Successfully');
    }
}
