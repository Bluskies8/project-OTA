<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminAccountController extends Controller
{
    public function create(Request $request)
    {
        UserAdmin::create([
            'admin_role_id' => $request->role_id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect('admin/account');
    }
    public function update(Request $request)
    {
        $data = UserAdmin::find($request->id);
        $data->admin_role_id = $request->role_id;
        $data->username = $request->username;
        ($request->password != null)?$data->password = Hash::make($request->password):"";
        $data->save();
        return redirect('admin/account');
    }
    public function delete($id)
    {
        UserAdmin::find($id)->delete();
        return "success";
    }
}
