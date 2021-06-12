<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::orderBy('id', 'desc')->get();
        return view('Backend.Experience.view', compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Experience.add');
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
            'exp_title' => 'required',
            'year' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
        ]);
        $experience = new Experience([
            'exp_title' => $request->exp_title,
            'company' => $request->company,
            'year' => $request->year,
            'location' => $request->location,
            'description' => $request->description,
        ]);
        $data = $experience->save();
        if ($data) {
            return redirect()->route('experience.index')->with('success', 'Experience details added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $experience = Experience::findorfail($id);
        return view('Backend.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);
        $request->validate([
            'exp_title' => 'required',
            'year' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
        ]);
        $experience->exp_title = $request->exp_title;
        $experience->description = $request->description;
        $experience->year = $request->year;
        $experience->company = $request->company;
        $experience->location = $request->location;
        $update = $experience->save();
        if ($update) {
            return redirect()->route('experience.index')->with('success', 'Experience details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($experience)
    {
        $experience = Experience::find($experience);
        $experience->delete();
        return redirect()->route('experience.index')->with('warning', 'Deleted Successfully');
    }
}
