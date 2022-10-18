<?php

namespace App\Http\Controllers;

use App\Models\ProductTourDate;
use App\Models\ProductTour;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductTourDateController extends Controller
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
        $tour = ProductTour::where('id', $request->tour_id)->first();
        $date_start = $request->date_start;
        // return date('Y-m-d H:i:s', strtotime($request->date_start . ' +5 day'));
        if($request->type == 1){
            do {
                $data = ProductTourDate::create([
                    'id' => '',
                    'tour_id' => $request->tour_id,
                    'date_start' => $date_start,
                    'date_end' => date('Y-m-d H:i:s', strtotime($date_start . ' +'.$tour->nights_count.' day')),
                    'single_suplement_price' => $request->single_suplement_price,
                    'adult_twin_share_price' => $request->adult_twin_share_price,
                    'child_with_bed_price' => $request->child_with_bed_price,
                    'child_no_bed_price' => $request->child_no_bed_price,
                ]);
                $date_start = date('Y-m-d H:i:s', strtotime($date_start . ' +1 day'));
            } while (date('Y-m-d H:i:s', strtotime($date_start . ' +'.$tour->nights_count.' day')) < date('Y-m-d H:i:s', strtotime($request->date_end . ' +1 day')));

        }else if($request->type == 0){
            $data = ProductTourDate::create([
                'id' => '',
                'tour_id' => $request->tour_id,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'single_suplement_price' => $request->single_suplement_price,
                'adult_twin_share_price' => $request->adult_twin_share_price,
                'child_with_bed_price' => $request->child_with_bed_price,
                'child_no_bed_price' => $request->child_no_bed_price,
            ]);
        }
        return $data;
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
     * @param  \App\Models\ProductTourDate  $productTourDate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $date = Carbon::today()->format('Y-m-d H:i:s');
        // $data = ProductTourDate::where('tour_id',$id)->whereDate('date_start', '<=',$date)->whereDate('date_end', '>=',$date)->get();
        $data = ProductTourDate::where('tour_id', $id)->get();
        return response()->json($data,200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTourDate  $productTourDate
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTourDate $productTourDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTourDate  $productTourDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ProductTourDate::where('id',$request->id)->first();
        $data->date_start = $request->date_start;
        $data->date_end = $request->date_end;
        $data->single_suplement_price = $request->single_suplement_price;
        $data->adult_twin_share_price = $request->adult_twin_share_price;
        $data->child_with_bed_price = $request->child_with_bed_price;
        $data->child_no_bed_price = $request->child_no_bed_price;
        $data->save();
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTourDate  $productTourDate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTourDate::where('id',$id)->first()->delete();
        return response()->json(['message' => 'Success'],200);
    }
    public function restore($id)
    {
        $temp = ProductTourDate::onlyTrashed()->where(['id' => $id])->restore();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }

    public function getTrash()
    {
        $temp = ProductTourDate::onlyTrashed()->get();
        return response()->json([
            'message' => 'Success',
            'data' => $temp
        ],200);
    }
}
