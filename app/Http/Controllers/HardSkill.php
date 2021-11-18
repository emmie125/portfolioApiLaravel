<?php

namespace App\Http\Controllers;

use App\Http\Resources\HardSkillResource;
use App\Models\HardSkill as HardSkillModel;
use Illuminate\Http\Request;

class HardSkill extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hardSkill = HardSkillModel::paginate(5);
        return  HardSkillResource::collection($hardSkill);
        // try {} catch (\Throwable $th) {
        //     return response()->json([
        //         'fail' => $th
        //     ], 400);
        // }
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
            HardSkillModel::create($request->all());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
