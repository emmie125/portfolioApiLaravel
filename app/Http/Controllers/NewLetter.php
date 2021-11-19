<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsLetterResource;
use App\Models\NewsLetter as NewsLetterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewLetter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $newsLetterSkill = NewsLetterModel::paginate(5);
        return  NewsLetterResource::collection($newsLetterSkill);

        } catch (\Throwable $th) {
            return response()->json([
                'fail' => $th
            ], 402);
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
            'email' => 'required|email:rfc,dns',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'fail' => $validator->errors(),
            ], 404);
        }
        try {
            NewsLetterModel::create($request->all());
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
