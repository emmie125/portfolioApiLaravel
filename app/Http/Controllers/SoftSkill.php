<?php

namespace App\Http\Controllers;

use App\Http\Resources\SoftSkillResource;
use App\Models\SoftSkill as SoftSkillModel;

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
        $softSkill = SoftSkillModel::paginate(5);
        return  SoftSkillResource::collection( $softSkill);
       
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
     * @param  \App\SoftSkillModel  $softSkill
     * @return \Illuminate\Http\Response
     */
    public function show(SoftSkillModel $softSkill)
    {
        return new SoftSkillResource($softSkill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoftSkillModel  $softSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoftSkillModel $softSkill)
    {
        
        if($softSkill->update($request->all())){
            return response()->json([
                'success'=>'updated succefuly'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
    * @param  \App\SoftSkillModel  $softSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoftSkillModel $softSkill)
    {
        if($softSkill->delete()){
            return response()->json([
                'success'=>'deleted succefuly'
            ],200);
        };
    }
}
