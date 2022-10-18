<?php

namespace App\Http\Controllers;

use App\Models\ProductTourThermcond;
use Illuminate\Http\Request;

class ProductTourThermcondController extends Controller
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
        if($request->hasFile('pdf')){
            // $filenameWithExt = $request->file('img')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('img')->getClientOriginalExtension();
            $saveFile = 'pdf_'.$request->tour_id.'.pdf';
            $path = $request->file('pdf')->storeAs('public/Tour/Tour'.$request->tour_id, $saveFile);
        }else{
            $path = '';
        }
        return ProductTourThermcond::create([
            'id' =>'',
            'tour_id' => $request->tour_id,
            'item' => $path,
            'text' => $request->text
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
     * @param  \App\Models\ProductTourThermcond  $productTourThermcond
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductTourThermcond::where('id',$id)->first();
        if($data->item!=""){
            $data->item = env('APP_URL').'/api/tour/Thermcond/getFile/'.$id;
        }
        return response()->json($data,200);
    }

    public function getFile($id)
    {
        $data = ProductTourThermcond::where('id',$id)->first();
        return response()->file(storage_path('/app/'.$data->item));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourThermcond  $productTourThermcond
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourThermcond $productTourThermcond)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourThermcond  $productTourThermcond
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ProductTourThermcond::where('tour_id',$request->id)->first();
        if($request->hasFile('pdf')){
            // $filenameWithExt = $request->file('img')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('img')->getClientOriginalExtension();
            $saveFile = 'pdf_'.$request->id.'.pdf';
            $path = $request->file('pdf')->storeAs('public/Tour/Tour'.$request->id, $saveFile);
            $data->item = $path;
        }
        if($request->has('text')) $data->text = $request->text;
        $data->save();
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourThermcond  $productTourThermcond
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTourThermcond::where('id', $id)->first()->delete();
        return response()->json(['message' => 'Success'],200);
    }
    public function restore($id)
    {
        $temp = ProductTourThermcond::onlyTrashed()->where(['id' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourThermcond::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
