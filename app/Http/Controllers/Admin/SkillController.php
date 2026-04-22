<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\Admin\SkillRequest;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        
        return view('admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $validated = $request->validated();
        $validated['color'] = '#ffffff';
        $validated['percent'] = 100;

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('images/skills', 'public');
        }

        Skill::create($validated);

        return to_route('admin.skill.index')->with('message', 'New skill Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SkillRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $validated = $request->validated();
        $validated['color'] = '#ffffff';
        $validated['percent'] = $skill->percent ?? 100;

        if ($request->hasFile('logo')) {
            if ($skill->logo != null) {
                Storage::disk('public')->delete($skill->logo);
            }
            $validated['logo'] = $request->file('logo')->store('images/skills', 'public');
        }

        $skill->update($validated);

        return to_route('admin.skill.index')->with('message', 'Skill Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        if ($skill->logo != null) {
            Storage::disk('public')->delete($skill->logo);
        }
        $skill->delete();

        return back()->with('message', 'Skill Deleted');
    }
}
