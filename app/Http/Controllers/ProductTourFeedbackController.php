<?php

namespace App\Http\Controllers;

use App\Models\ProductTourFeedback;
use Illuminate\Http\Request;

class ProductTourFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return ProductTourFeedback::create([
            'id' => '',
            'tour_id' => $request->tour_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'review' => $request->review
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTourFeedback  $productTourFeedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductTourFeedback::where('id',$id)->first();
        return response()->json($data,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourFeedback  $productTourFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourFeedback $productTourFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourFeedback  $productTourFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ProductTourFeedback::where('id',$request->id)->first();
        $data->rating = $request->rating;
        $data->review = $request->review;
        $data->save();
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourFeedback  $productTourFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTourFeedback::where('id',$id)->first()->delete();
        return response()->json(['message' => 'Success'],200);
    }
    public function restore($id)
    {
        $temp = ProductTourFeedback::onlyTrashed()->where(['id' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourFeedback::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
