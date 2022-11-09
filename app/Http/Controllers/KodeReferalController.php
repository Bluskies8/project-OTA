<?php

namespace App\Http\Controllers;

use App\Models\kodeReferal;
use App\Models\kodeReferalDetail;
use Illuminate\Http\Request;

class KodeReferalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kodeReferal::get();
        return view('pages.backoffice.master_referral',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = kodeReferalDetail::with('user')->where('referal_id', $id)->get();
        foreach ($data as $key) {
            if($key->user->middle_name == ""){
                $name = $key->user->first_name. ' '. $key->user->last_name;
            }else{
                $name = $key->user->first_name.' '.$key->user->middle_name.' '.$key->user->last_name;
            }
            $key->nama = $name;
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
        $request->validate([
            'kode' => 'required',
            'limit' => 'required|numeric',
            'diskon' => 'required|numeric',
            'tipe' => 'required'
        ]);
        kodeReferal::create([
            'kode' => $request->kode,
            'limit' => $request->limit,
            'discount' => $request->diskon,
            'tipe' => $request->tipe,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kodeReferal  $kodeReferal
     * @return \Illuminate\Http\Response
     */
    public function show(kodeReferal $kodeReferal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kodeReferal  $kodeReferal
     * @return \Illuminate\Http\Response
     */
    public function edit(kodeReferal $kodeReferal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kodeReferal  $kodeReferal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kodeReferal $kodeReferal)
    {
        $data = kodeReferal::where('id',$request->id)->first();
        $data->tipe = $request->tipe;
        $data->kode = $request->kode;
        $data->discount = $request->amount;
        $data->limit = $request->limit;
        $data->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kodeReferal  $kodeReferal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kodeReferal::where('id',$id)->delete();
    }
}
