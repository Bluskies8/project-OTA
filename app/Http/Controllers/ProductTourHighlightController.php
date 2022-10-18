<?php

namespace App\Http\Controllers;

use App\Models\ProductTour;
use App\Models\ProductTourHighlight;
use Illuminate\Http\Request;

class ProductTourHighlightController extends Controller
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
        return ProductTourHighlight::create([
            'id' => '',
            'tour_id' => $request->tour_id,
            'item' => $request->item,
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
     * @param  \App\Models\ProductTourHighlight  $productTourHighlight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductTourHighlight::where('id',$id)->first();
        return response()->json($data,200);
    }
    public function showAll($id)
    {
        $data = ProductTourHighlight::where('tour_id',$id)->get();
        return response()->json($data,200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourHighlight  $productTourHighlight
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourHighlight $productTourHighlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourHighlight  $productTourHighlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        foreach($request->data as $key => $value){
            if($value['id'] != null){
                $data = productTourHighlight::where('tour_id',$id)->where('id',$value['id'])->first();
                $data->item = $value['value'];
                $data->save();
            }else{
                productTourHighlight::create([
                    'tour_id' => $id,
                    'item' => $value['value'],
                ]);
            }
        }
        return response()->json("success",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourHighlight  $productTourHighlight
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTourHighlight::where('id',$id)->first()->delete();
        return response()->json(['message' => 'Success'],200);
    }
    public function restore($id)
    {
        $temp = ProductTourHighlight::onlyTrashed()->where(['id' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourHighlight::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
