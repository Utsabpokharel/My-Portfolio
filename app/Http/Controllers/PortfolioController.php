<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::orderBy('id', 'desc')->get();
        return view('Backend.Portfolio.view', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Portfolio.add');
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
            'project_name' => 'required',
            'description' => 'required',
            'image' => 'required | image',
            'category' => 'required',
        ]);
        $portfolio = new Portfolio([
            'project_name' => $request->project_name,
            'description' => $request->description,
            'category' => $request->category,
            'project_url' => $request->project_url,
            'project_date' => $request->project_date,
            'client' => $request->client
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "Project-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/Portfolio/', $name);
        }
        $portfolio->image = $name;

        $data = $portfolio->save();


        if ($data) {
            return redirect()->route('portfolio.index')->with('success', 'New Project added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::findorfail($id);
        return view('Backend.Portfolio.details', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $portfolio = Portfolio::findorfail($id);
        return view('Backend.Portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $request->validate([
            'project_name' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $portfolio->project_name = $request->project_name;
        $portfolio->description = $request->description;
        $portfolio->project_url = $request->project_url;
        $portfolio->category = $request->category;
        $portfolio->project_date = $request->project_date;
        $portfolio->client = $request->client;
        if ($request->image != '') {
            $path = public_path() . '/Uploads/portfolios/';

            //code for remove old file
            if ($portfolio->image != ''  && $portfolio->image != null) {
                $file_old = $path . $portfolio->image;
                unlink($file_old);
            }

            //upload new file
            $file = $request->image;
            $filename = "Project-" . time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //for update in table
            // $employee->update(['file' => $filename]);
            $portfolio->image = $filename;
        }

        $update = $portfolio->save();
        if ($update) {
            return redirect()->route('portfolio.index')->with('success', 'Project details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($portfolio)
    {
        $portfolio = Portfolio::find($portfolio);
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('warning', 'Deleted Successfully');
    }
}
