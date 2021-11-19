<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project as ProjectModel;
use App\Models\Technology as TechnologyModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Project extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $projectSkill = ProjectModel::paginate(5);
            return  ProjectResource::collection($projectSkill);
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
        $validator = Validator::make($request->all(), [
            'technology_id' => 'exists:technologies,id', 
            'title' => 'required', 
            'image' => 'required|mimes:jpeg,jpg,png,gif', 
            'description'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'fail' => $validator->errors(),
            ], 404);
        }
        try {
            $technology_id = intVal($request->technology_id);
            $technology = TechnologyModel::find($technology_id);
            $project = ProjectModel::create($request->all());

            $project->technologies()->attach($technology->id);

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
