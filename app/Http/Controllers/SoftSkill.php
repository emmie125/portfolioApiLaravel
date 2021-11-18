<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

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
        try {
            $softSkill = SoftSkillModel::paginate(5);
            return  SoftSkillResource::collection($softSkill);
        } catch (\Throwable $th) {
            return response()->json([
                'fail' => $th
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            SoftSkillModel::create($request->all());
            return response()->json([
                'success' => 'created succefuly'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'fail' => $th
            ], 402);
        }
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
        try {
            $softSkill->update($request->all());
            return response()->json([
                'success' => 'updated succefuly'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'fail' => $th,
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoftSkillModel  $softSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoftSkillModel $softSkill)
    {
        if ($softSkill->delete()) {
            return response()->json([
                'success' => 'deleted succefuly'
            ], 200);
        };
    }
}
