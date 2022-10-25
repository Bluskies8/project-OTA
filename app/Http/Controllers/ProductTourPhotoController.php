<?php

namespace App\Http\Controllers;

use App\Models\ProductTourPhoto;
use Illuminate\Http\Request;

class ProductTourPhotoController extends Controller
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
        $request->validate([
            'img' => 'mimes:jpeg,jpg,png|required',
            'tour_id' => 'required'
        ]);
        $temp = ProductTourPhoto::where('tour_id', $request->tour_id)->count();
        // dd($temp);
        $count = $temp+1;
        if($request->hasFile('img')){
            $saveFile = 'Tour'.$request->tour_id.'_photo_'.$count.'.jpg';
            $path = $request->file('img')->storeAs('public/Tour/Tour'.$request->tour_id, $saveFile);
        }
        return ProductTourPhoto::create([
            'id' => '',
            'tour_id' => $request->tour_id,
            'title' => $request->tittle,
            'img_url' => $path
        ]);
    }
    // public function getImg($id)
    // {
    //     $temp = ProductTourPhoto::where('id', $id)->first();

    //     return response()->file(storage_path('/app/'.$temp->img_url));
    // }
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
     * @param  \App\Models\ProductTourPhoto  $productTourPhoto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductTourPhoto::where('id',$id)->first();
        return response()->file(storage_path('/app/'.$data->img_url));
    }
    public function showAll($id)
    {
        $data = [];
        $find = ProductTourPhoto::where('tour_id',$id)->get();
        if(!$find) return response()->json([],200);
        foreach ($find as $key) {
            $data[] = [
                'id' => $key->id,
                'title' => $key->title,
                'img_url' => env('APP_URL').'/api/tour/Photo/getimg/'.$key->id
            ];
        }
        return response()->json($data,200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourPhoto  $productTourPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourPhoto $productTourPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourPhoto  $productTourPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'img' => 'mimes:jpeg,jpg,png'
        ]);
        $data = ProductTourPhoto::where('id', $request->id)->first();
        if($request->hasFile('img')){
            $saveFile = 'Tour'.$data->tour_id.'_photo_'.$data->id.'.jpg';
            $path = $request->file('img')->storeAs('/Tour/Tour'.$data->tour_id, $saveFile);
            $data->img_url = $path;
        }
        $data->title = $request->title;
        $data->save();
        return redirect()->back()->with('msg',"foto berhasil tersimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourPhoto  $productTourPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductTourPhoto::where('id',$id)->first()->delete();
        return response()->json([
            'message' => 'Success'
        ],200);
    }
    public function restore($id)
    {
        $temp = ProductTourPhoto::onlyTrashed()->where(['id' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourPhoto::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
