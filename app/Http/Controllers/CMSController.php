<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\DisplayBanner;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CMSController extends Controller
{
    public function showStaticImages(Request $request)
    {
        return view('pages.backoffice.staticimage');
    }
    public function getPhotoCarousel($id)
    {
        $data = Carousel::where('id',$id)->first();
        return response()->file(storage_path('/app/'.$data->url_image));
    }
    public function showCarousel(Request $request)
    {
        $data = Carousel::get();
        foreach ($data as $key) {
            $key->url_image = env('APP_URL').'/carousel/'.$key->id;
        }
        return view('pages.backoffice.carousel',compact('data'));
    }

    public function createCarousel(Request $request)
    {
        $count = Carousel::max('id')+1;
        if($request->hasFile('imagefile')){
            $saveFile = 'carousel_'.$count.'.jpg';
            $path = $request->file('imagefile')->storeAs('/public/Carousel', $saveFile);
        }
        Carousel::create([
            'url_image' => $path,
            'direct_link' =>$request->link
        ]);
        return redirect()->back();
    }
    public function updateCarousel(Request $request,$id)
    {
        $data = Carousel::find($id);
        if($request->hasFile('imagefile')){
            $saveFile = 'carousel_'.$id.'.jpg';
            $path = $request->file('imagefile')->storeAs('/public/Carousel', $saveFile);
            $data->url_image = $path;
        }
        $data->direct_link = $request->link;
        $data->save();
        return redirect()->back();
    }
    public function deleteCarousel($id)
    {
        $data = Carousel::find($id);
        if(Storage::exists($data->url_image)){
            Storage::delete($data->url_image);
            $data->delete();
            /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }else{
            dd('File does not exists.');
        }
        return "success";
    }

    public function showDisplayBanner()
    {
        $data = DisplayBanner::get();
        $tag = Tag::get();
        foreach ($data as $key) {
            $temp = "";
            $explode = explode(',', $key->tags);
            foreach ($tag as $key2) {
                if(in_array($key2->id,$explode)){
                    if($temp == ""){
                        $temp = $key2->name;
                    }else{
                        $temp .= ', '.$key2->name;
                    }
                }
            }
            $key->tags_name = $temp;
        }
        // dd($data);
        return view('pages.backoffice.displaybanner',compact('data','tag'));
    }
    public function createDisplayBanner(Request $request)
    {
        $count = DisplayBanner::count();
        DisplayBanner::create([
            'index' => ($count+1),
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
            'enabled' => 0
        ]);
        return redirect()->back();
    }
    public function updateDisplayBanner(Request $request,$id)
    {
        $data = DisplayBanner::find($id);
        $data->index = $request->index;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->tags = $request->tags;
        $data->enabled = $request->enabled;
        $data->save();
        return redirect()->back();
    }
    public function deleteDisplayBanner($id)
    {
        $data = DisplayBanner::find($id)->delete();
        return "success";
    }
}
