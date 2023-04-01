<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailRequest;
use App\Http\Requests\UpdateDetailRequest;
use App\Models\Question;
use App\Models\QuestionDetail;
use Illuminate\Support\Arr;

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
    public function store(StoreDetailRequest $request)
    {
        $request->validated();

        Question::upsert(Arr::toUpper($request->input('detail')), ['id']);

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
    public function show(Question $detail)
    {
        return QuestionDetail::query()
        ->select('id', 'question_id', 'A', 'B', 'C', 'D', 'E', 'answer')
        ->where('question_id', $detail->id)->get();

        return response()->json($detail);
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
    public function update(UpdateDetailRequest $request, QuestionDetail $questionDetail)
    {
        $request->validated();

        QuestionDetail::upsert(Arr::toUpper($request->input('detail')), ['id', 'question_id']);

        return response()->json(
            [
                'request' => $request->all(),
                'message' => 'success',
            ]
        );
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

    public function take($id = null)
    {
        $query = Question::with('detail')
        ->whereHas('detail', fn ($builder) => $builder->select('question_details.id'));

        if (! is_null($id)) {
            $query = $query->whereHas('groups', fn ($builder) => $builder->select('groups.id')->where('group_id', $id));
        } else {
            $query = $query->inRandomOrder();
        }

        $question = $query->first();

        if (is_null($question)) {
            return response()->json([
                'message' => 'Tidak ada pertanyaan untuk group ' . $id,
                'errors' => true,
            ]);
        }

        return response()->json($question);
    }
}
