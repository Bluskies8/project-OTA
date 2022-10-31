<?php

namespace App\Http\Controllers;

use App\Models\AdminRole;
use Illuminate\Http\Request;

class adminRoleController extends Controller
{
    public function create(Request $request)
    {
        AdminRole::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);
        return redirect('backoffice/role');
    }
    public function update(Request $request)
    {
        $data = AdminRole::find($request->id);
        $data->name = $request->name;
        $data->type = $request->type;
        $data->save();
        return redirect('backoffice/role');
    }
    public function delete($id)
    {
        AdminRole::find($id)->delete();
        return "success";
    }
}
