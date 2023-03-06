<?php

namespace App\Http\Controllers;

use App\Models\QuestionDetail;
use Illuminate\Http\Request;

class QuestionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'hallo';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        logger($request);

        return response()->json(
            [
                'request' => $request->all(),
                'message' => 'success',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionDetail  $questionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionDetail $questionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionDetail  $questionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionDetail $questionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionDetail  $questionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionDetail $questionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionDetail  $questionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionDetail $questionDetail)
    {
        //
    }
}
