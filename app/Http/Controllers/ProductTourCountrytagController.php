<?php

namespace App\Http\Controllers;

use App\Models\ProductTourCountrytag;
use Illuminate\Http\Request;

class ProductTourCountrytagController extends Controller
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
        
        $data = ProductTourCountrytag::create([
            'id' => '',
            'tour_id' => $request->tour_id,
            'country_id' => $request->country_id
        ]);
        return response()->json($data,200);
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
     * @param  \App\Models\ProductTourCountrytag  $productTourCountrytag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductTourCountrytag::where('id',$id)->first();
        return response()->json($data,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourCountrytag  $productTourCountrytag
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourCountrytag $productTourCountrytag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourCountrytag  $productTourCountrytag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ProductTourCountrytag::where('id',$request->id)->first();
        $data->country_id = $request->country_id;
        $data->save();
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourCountrytag  $productTourCountrytag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTourCountrytag::where('id',$id)->first()->delete();
        return response()->json(['message' => 'Success'],200);
    }
    public function restore($id)
    {
        $temp = ProductTourCountrytag::onlyTrashed()->where(['id' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourCountrytag::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
