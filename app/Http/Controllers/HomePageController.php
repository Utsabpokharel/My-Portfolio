<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function create()
    {
        $home = HomePage::first();
        return view('Backend.Homepage.homepage', compact('home'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'background_image' => 'required'

        ]);
        $home = new HomePage([
            'description' => $request->description,
        ]);
        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $name = "HomePage-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/Homepage/', $name);
        }
        $home->background_image = $name;
        //    dd($home);
        $data = $home->save();
        //    dd($data);

        if ($data) {
            return redirect()->back()->with('success', 'Home Page details added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }
    public function edit($id)
    {
        $HomePage = HomePage::findOrFail($id);
        return back();
    }
    public function update(Request $request, $id)
    {
        $home = HomePage::findOrFail($id);
        $request->validate([
            'description' => 'required',
        ]);
        $home->description = $request->description;
        $update = $home->save();
        if ($update) {
            return redirect()->back()->with('success', 'Home Page details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }
}
