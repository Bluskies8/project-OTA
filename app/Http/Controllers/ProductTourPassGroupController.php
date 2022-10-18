<?php

namespace App\Http\Controllers;

use App\Models\ProductTourPassGroup;
use Illuminate\Http\Request;

class ProductTourPassGroupController extends Controller
{
    function generateRandomString($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
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
        $inquery = $this->generateRandomString(10);
        $check = ProductTourPassGroup::where('inquery',$inquery)->first();
        while ($check) {
            $inquery = $this->generateRandomString(10);
            $check = ProductTourPassGroup::where('inquery',$inquery)->first();
        }
        return ProductTourPassGroup::create([
            'id' => '',
            'inquery' => $inquery,
            'tour_id' => $request->tour_id,
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
     * @param  \App\Models\ProductTourPassGroup  $productTourPassGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductTourPassGroup::where('inquery',$id)->first();
        return response()->json($data,200);
    }
    public function showAll($id)
    {
        $data = ProductTourPassGroup::where('tour_id',$id)->get();
        return response()->json($data,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourPassGroup  $productTourPassGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourPassGroup $productTourPassGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourPassGroup  $productTourPassGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ProductTourPassGroup::where('inquery',$request->inquery)->first();
        $data->tour_id = $request->tour_id;
        $data->save();
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourPassGroup  $productTourPassGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTourPassGroup::where('inquery',$id)->first()->delete();
        return response()->json(['message' => 'Success'],200);
    }
    public function restore($id)
    {
        $temp = ProductTourPassGroup::onlyTrashed()->where(['inquery' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourPassGroup::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
