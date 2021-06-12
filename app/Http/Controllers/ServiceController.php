<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id', 'desc')->get();
        return view('Backend.Services.view', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Services.add');
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
            'service_name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required | image',
        ]);
        $service = new Service([
            'service_name' => $request->service_name,
            'description' => $request->description,
        ]);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = "Service-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/Services/', $name);
        }
        $service->thumbnail = $name;

        $data = $service->save();


        if ($data) {
            return redirect()->route('service.index')->with('success', 'Services added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $service = Service::findorfail($id);
        return view('Backend.Services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'service_name' => 'required',
            'description' => 'required',
        ]);
        $service->service_name = $request->service_name;
        $service->description = $request->description;
        if ($request->thumbnail != '') {
            $path = public_path() . '/Uploads/Services/';

            //code for remove old file
            if ($service->thumbnail != ''  && $service->thumbnail != null) {
                $file_old = $path . $service->thumbnail;
                unlink($file_old);
            }

            //upload new file
            $file = $request->thumbnail;
            $filename = "Service-" . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //for update in table
            // $employee->update(['file' => $filename]);
            $service->thumbnail = $filename;
        }

        $update = $service->save();
        if ($update) {
            return redirect()->route('service.index')->with('success', 'Services details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($service)
    {
        $service = Service::find($service);
        $service->delete();
        return redirect()->route('service.index')->with('warning', 'Deleted Successfully');
    }
}
