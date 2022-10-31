<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $slug = str_replace(' ', '-', $request->name);
        Tag::create([
            'name' => $request->name,
            'slug' => $slug
        ]);
        return redirect('backoffice/tag');
    }
    public function update(Request $request)
    {
        $data = Tag::find($request->id);
        $data->name = $request->name;
        $data->save();
        return "success";
    }
    public function delete($id)
    {
        Tag::find($id)->delete();
        return "success";
    }
}
