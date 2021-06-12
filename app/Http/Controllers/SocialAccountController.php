<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use Illuminate\Http\Request;

class SocialAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialaccount = SocialAccount::orderBy('id', 'desc')->get();
        return view('Backend.SocialAccounts.view', compact('socialaccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.SocialAccounts.add');
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
            'social_site' => 'required',
            'url' => 'required',
            'icon' => 'required | image',
        ]);
        $socialaccount = new SocialAccount([
            'social_site' => $request->social_site,
            'url' => $request->url,
        ]);
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $name = "Social-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/SocialAccount/', $name);
        }
        $socialaccount->icon = $name;

        $data = $socialaccount->save();


        if ($data) {
            return redirect()->route('socialaccount.index')->with('success', 'New Social Account added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\socialaccount  $socialaccount
     * @return \Illuminate\Http\Response
     */
    public function show(socialaccount $socialaccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\socialaccount  $socialaccount
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $socialaccount = SocialAccount::findorfail($id);
        return view('Backend.SocialAccounts.edit', compact('socialaccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\socialaccount  $socialaccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $socialaccount = SocialAccount::findOrFail($id);
        $request->validate([
            'social_site' => 'required',
            'url' => 'required',
        ]);
        $socialaccount->social_site = $request->social_site;
        $socialaccount->url = $request->url;
        if ($request->icon != '') {
            $path = public_path() . '/Uploads/SocialAccount/';

            //code for remove old file
            if ($socialaccount->icon != ''  && $socialaccount->icon != null) {
                $file_old = $path . $socialaccount->icon;
                unlink($file_old);
            }

            //upload new file
            $file = $request->icon;
            $filename = "socialaccount-" . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //for update in table
            // $employee->update(['file' => $filename]);
            $socialaccount->icon = $filename;
        }

        $update = $socialaccount->save();
        if ($update) {
            return redirect()->route('socialaccount.index')->with('success', 'Social Account details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\socialaccount  $socialaccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($socialaccount)
    {
        $socialaccount = SocialAccount::find($socialaccount);
        $socialaccount->delete();
        return redirect()->route('socialaccount.index')->with('warning', 'Deleted Successfully');
    }
}
