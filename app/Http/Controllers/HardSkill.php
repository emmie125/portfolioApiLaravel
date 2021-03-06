<?php

namespace App\Http\Controllers;

use App\Http\Resources\HardSkillResource;
use App\Models\HardSkill as HardSkillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class HardSkill extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hardSkill = DB::table('hard_skills')
            ->join('technologies', 'hard_skills.id', '=', 'technologies.id_hard')
            ->select('hard_skills.*', 'technologies.*')
            ->limit(10)
            ->get();
        return  $hardSkill;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:hard_skills',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'fail' => $validator->errors(),
            ], 422);
        }
        
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
