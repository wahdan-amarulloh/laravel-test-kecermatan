<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Subscription::select('id', 'name')->pluck('name', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'status' => 'required|max:2',
            'attempt' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'days' => 'required|integer|min:1',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // If the validation fails, return the error response
        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
            ], 422);
        }
        $subscription = Subscription::create([
            'name' => $request->name,
            'attempt' => $request->attempt,
            'price' => $request->price,
            'status' => $request->status,
            'days' => $request->days,
        ]);

        return response()->json(
            [
                'plan' => $subscription->name,
                'message' => 'success',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $plan)
    {
        return response()->json($plan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $plan)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'status' => 'required|max:2',
            'attempt' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'days' => 'required|integer|min:1',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $plan->name = $request->name;
        $plan->status = $request->status;
        $plan->attempt = $request->attempt;
        $plan->price = $request->price;
        $plan->days = $request->days;
        $plan->save();

        return response()->json(
            [
                'plan' => $plan->name,
                'message' => 'success',
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function user(Request $request, User $user)
    {
        $user->subscription_id = $request->plan;
        $user->save();

        return response()
               ->json([
                   'request' => $request->all(),
                   'user' => $user,
                   'message' => 'success',
               ]);
    }
}
