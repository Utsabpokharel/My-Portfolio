<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::orderBy('id', 'desc')->get();
        return view('Backend.Testimonials.view', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Testimonials.add');
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
            'name' => 'required',
            'description' => 'required',
            'designation' => 'required',
            'photo' => 'required | image',
        ]);
        $testimonial = new Testimonial([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = "Testimonial-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/Testimonial/', $name);
        }
        $testimonial->photo = $name;

        $data = $testimonial->save();


        if ($data) {
            return redirect()->route('testimonial.index')->with('success', 'Testimonial added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $testimonial = Testimonial::findorfail($id);
        return view('Backend.Testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'designation' => 'required',
        ]);
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->designation = $request->designation;
        if ($request->photo != '') {
            $path = public_path() . '/Uploads/Testimonial/';

            //code for remove old file
            if ($testimonial->photo != ''  && $testimonial->photo != null) {
                $file_old = $path . $testimonial->photo;
                unlink($file_old);
            }

            //upload new file
            $file = $request->photo;
            $filename = "Testimonial-" . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //for update in table
            // $employee->update(['file' => $filename]);
            $testimonial->photo = $filename;
        }

        $update = $testimonial->save();
        if ($update) {
            return redirect()->route('testimonial.index')->with('success', 'Testimonial details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($testimonial)
    {
        $testimonial = Testimonial::find($testimonial);
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('warning', 'Deleted Successfully');
    }
}
