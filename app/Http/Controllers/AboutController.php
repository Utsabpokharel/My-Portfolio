<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{

    public function create()
    {
        $abt = About::first();
        // dd($abt == []);

        return view('Backend.About.about', compact('abt'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'about' => 'required|min:10 |max:100',
            'short_description' => 'required',
            'profession' => 'required',
            'photo' => 'required',
            'freelancing' => 'required',
        ]);
        $about = new About([
            'about' => $request->about,
            'profession' => $request->profession,
            'short_description' => $request->short_description,
            'freelancing' => $request->freelancing
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = "About-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/About/', $name);
            // $about->ctzn_front = $name;
        }
        $about->photo = $name;
        //    dd($about);
        $data = $about->save();
        //    dd($data);

        if ($data) {
            return redirect()->back()->with('success', 'About Me added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return back();
    }
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $request->validate([
            'about' => 'required|min:10 |max:100',
            'short_description' => 'required',
            'profession' => 'required',
            'freelancing' => 'required',
        ]);
        $about->about = $request->about;
        $about->short_description = $request->short_description;
        $about->profession = $request->profession;
        $about->freelancing = $request->freelancing;
        if ($request->photo != '') {
            $path = public_path() . '/Uploads/About/';

            //code for remove old file
            if ($about->photo != ''  && $about->photo != null) {
                $file_old = $path . $about->photo;
                unlink($file_old);
            }

            //upload new file
            $file = $request->photo;
            $filename = "About-" . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //for update in table
            // $employee->update(['file' => $filename]);
        }
        $about->photo = $filename;
        $update = $about->save();
        if ($update) {
            return redirect()->back()->with('success', 'About details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }
}
