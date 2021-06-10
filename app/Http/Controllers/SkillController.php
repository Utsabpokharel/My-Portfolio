<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Skill::orderBy('id', 'desc')->get();
        return view('Backend.Skills.view', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Skills.add');
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
            'skill_name' => 'required',
            'ability' => 'required',
        ]);

        $data = $request->all();
        $skill = Skill::create($data);
        return redirect()->route('skill.index')->with('success', 'New Skill added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $skill = Skill::findorfail($id);
        return view('Backend.Skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $skill)
    {
        $skill = Skill::findorfail($skill);
        $request->validate([
            'skill_name' => 'required',
            'ability' => 'required',
        ]);

        $skill->skill_name = $request->skill_name;
        $skill->ability = $request->ability;
        $update = $skill->save();
        // dd($update);
        if ($update) {
            return redirect()->route('skill.index')->with('success', 'skills updated successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured while updating.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($skill)
    {
        $skill = Skill::find($skill);
        $skill->delete();
        return redirect()->route('skill.index')->with('warning', 'Deleted Successfully');
    }
}
