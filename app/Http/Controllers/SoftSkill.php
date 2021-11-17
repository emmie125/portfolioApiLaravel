<?php

namespace App\Http\Controllers;

use App\Http\Resources\SoftSkillResource;
use App\Models\SoftSkillModel;

use Illuminate\Http\Request;

class SoftSkill extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return SoftSkillResource::collection(SoftSkillModel::orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(SoftSkillModel::create($request->all())){
            return response()->json([
                'success'=>'created succefuly'
            ],200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoftSkillModel  $soft_skill
     * @return \Illuminate\Http\Response
     */
    public function show(SoftSkillModel $soft_skill)
    {
        return new SoftSkillResource($soft_skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoftSkillModel  $soft_skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoftSkillModel $soft_skill)
    {
        
        if($soft_skill->update($request->all())){
            return response()->json([
                'success'=>'updated succefuly'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
    * @param  \App\SoftSkillModel  $soft_skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoftSkillModel $soft_skill)
    {
        if($soft_skill->delete()){
            return response()->json([
                'success'=>'deleted succefuly'
            ],200);
        };
    }
}
