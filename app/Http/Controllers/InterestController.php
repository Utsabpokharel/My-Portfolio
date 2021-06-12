<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interest = Interest::orderBy('id', 'desc')->get();
        return view('Backend.Interests.view', compact('interest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Interests.add');
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
            'interest_field' => 'required',
            'icon' => 'required',
        ]);
        $interest = new Interest([
            'interest_field' => $request->interest_field,
        ]);
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $name = "Interest-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/Interest/', $name);
        }
        $interest->icon = $name;
        $data = $interest->save();
        return redirect()->route('interest.index')->with('success', 'New Interest added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $interest = Interest::findorfail($id);
        return view('Backend.Interests.edit', compact('interest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $interest = Interest::findOrFail($id);
        $request->validate([
            'interest_field' => 'required',
        ]);
        $interest->interest_field = $request->interest_field;
        if ($request->icon != '') {
            $path = public_path() . '/Uploads/Interest/';

            //code for remove old file
            if ($interest->icon != ''  && $interest->icon != null) {
                $file_old = $path . $interest->icon;
                unlink($file_old);
            }

            //upload new file
            $file = $request->icon;
            $filename = "Interest-" . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);
        }
        $interest->icon = $filename;
        $update = $interest->save();
        if ($update) {
            return redirect()->back()->with('success', 'interest details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
        $interest = Interest::find($interest);
        $interest->delete();
        return redirect()->route('interest.index')->with('warning', 'Deleted Successfully');
    }
}
