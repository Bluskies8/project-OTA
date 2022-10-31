<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function create(Request $request)
    {
        supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        return redirect('backoffice/supplier');
    }
    public function update(Request $request)
    {
        $data = supplier::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->save();
        return redirect('backoffice/supplier');
    }
    public function delete($id)
    {
        supplier::find($id)->delete();
        return "success";
    }
}
