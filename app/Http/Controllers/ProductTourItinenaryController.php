<?php

namespace App\Http\Controllers;

use App\Models\ProductTourItinenary;
use Illuminate\Http\Request;

class ProductTourItinenaryController extends Controller
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
        return ProductTourItinenary::create([
            'id' => '',
            'tour_id' => $request->tour_id,
            'label' => $request->label,
            'description' => $request->description,
            'breakfast' => $request->breakfast,
            'lunch' => $request->lunch,
            'dinner' => $request->dinner,
            'transport' => $request->transport,
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
     * @param  \App\Models\ProductTourItinenary  $productTourItinenary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductTourItinenary::where('id',$id)->first();
        return response()->json($data,200);
    }
    public function showAll($id)
    {
        $data = ProductTourItinenary::where('tour_id',$id)->get();
        return response()->json($data,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourItinenary  $productTourItinenary
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourItinenary $productTourItinenary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourItinenary  $productTourItinenary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        foreach($request->data as $key => $value){
            if($value['id'] != null){
                $data = ProductTourItinenary::where('tour_id',$id)->where('id',$value['id'])->first();
                $data->label = $value['value'];
                $data->breakfast = 0;
                $data->lunch = 0;
                $data->dinner = 0;
                $data->save();
            }else{
                ProductTourItinenary::create([
                    'tour_id' => $id,
                    'label'=>  $value['value'],
                    'breakfast'=> '0',
                    'lunch'=> '0',
                    'dinner'=> '0',
                ]);
            }
        }
        return response()->json("success",200);
    }
    // public function update(Request $request)
    // {
    //     $data = ProductTourItinenary::where('id', $request->id)->first();
    //     $data->label = $request->label;
    //     $data->description = $request->description;
    //     $data->breakfast = $request->breakfast;
    //     $data->lunch = $request->lunch;
    //     $data->dinner = $request->dinner;
    //     $data->transport = $request->transport;
    //     $data->save();
    //     return response()->json($data,200);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourItinenary  $productTourItinenary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTourItinenary::where('id', $id)->first()->delete();
        return response()->json(['message' => 'Success'],200);
    }
    public function restore($id)
    {
        $temp = ProductTourItinenary::onlyTrashed()->where(['id' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourItinenary::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
