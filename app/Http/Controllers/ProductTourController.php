<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\ProductTour;
use App\Models\ProductTourPhoto;
use App\Models\ProductTourThermcond;
use App\Models\Supplier;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductTourController extends Controller
{
    public function bulk(Request $request)
    {
        $opt = $request->opt;
        foreach ($request->id as $key ) {
            $data = ProductTour::where('id',$key)->first();
            if($opt == 'enabled')$data->enabled = 1;
            if($opt == 'disabled')$data->enabled = 0;
            $data->save();
        }
        return response()->json(['message' => ' Updated']);
    }

    public function show(ProductTour $productTour)
    {
        if ($productTour->enabled==0) return response()->json(['message' => "Tour cannot be accessed!"], 404);
        $temp1 = [];
        $temp = $productTour->load(['highlights', 'itinenaries', 'photos', 'includes', 'excludes', 'availableDates', 'countryTags', 'feedbacks', 'cancelPolicies', 'thermsConds']);
        $ori = $productTour->getOriginal();
        $ori['header_img_url'] = env('APP_URL').'/tour/imgh/'.$ori['id'];
        $ori['thumbnail_img_url'] = env('APP_URL').'/tour/imgt/'.$ori['id'];
        $data['data'] = $ori;
        $rating = json_decode($temp->feedbacks);
        $temp1 = 0;
        $count = 0;
        if($rating){
            foreach ($rating as $key) {
                $temp1 += $key->rating;
                $count++;
            }
            $data['rating'] = $temp1/$count;
        }else{
            $data['rating'] = 0;

        }
        $data['highlights'] = $temp->highlights;
        $data['itinenaries'] = $temp->itinenaries;
        $photo = json_decode($temp->photos);
        foreach ($photo as $key) {
            $key->img_url = env('APP_URL').'/tour/Photo/getimg/'.$key->id;
        }
        $data['photos'] = $photo;
        $data['includes'] = $temp->includes;
        $data['excludes'] = $temp->excludes;
        $data['availableDates'] = $temp->availableDates;
        $data['countryTags'] = $temp->countryTags;
        $data['feedbacks'] = $temp->feedbacks;
        $data['cancelPolicies'] = $temp->cancelPolicies;
        $data['thermsConds'] = $temp->thermsConds;
        // dd($data);
        return view('pages.user.tour',[
            'data' => $data,
        ]);
    }
    public function quote(Request $request)
    {
        $data = ProductTour::find($request->id);
        return view('pages.user.datadiri');
        return response()->json($data,200);
    }
    public function showPhoto($id)
    {
        $data = ProductTourPhoto::where('id',$id)->first();
        // return $data;
        return response()->file(storage_path('/app/public/'.$data->img_url));
    }
    public function showAllPhoto($id)
    {
        $data = [];
        $find = ProductTourPhoto::where('tour_id',$id)->get();
        if(!$find) return response()->json([],200);
        foreach ($find as $key) {
            $key->img_url = env('APP_URL').'/tour/Photo/getimg/'.$key->id;
            // $data[] = [
            //     'id' => $key->id,
            //     'title' => $key->title,
            //     'img_url' => env('APP_URL').'/tour/Photo/getimg/'.$key->id
            // ];
        }
        dd($find);
        return response()->json($find,200);
    }

    public function showbyId($id)
    {
        $data = ProductTour::with('photos')->where('slug',$id)->first();
        if(isset($data->photos)) {
            foreach ($data->photos as $key) {
                $key->img_url = env('APP_URL').'/tour/Photo/getimg/'.$key->id;
            }
        }
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $data->valid_date_start)->format('Y-m-d');
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $data->valid_date_end)->format('Y-m-d');
        $tempTags = [];
        foreach (explode(",", $data->tags) as $tag) {
            $tempTags[] = Tag::find($tag);
        }
        $tempCountryTags = [];
        foreach (explode(",", $data->countrytag) as $tag) {
            $tempCountryTags[] = country::find($tag);
        }
        $data->header_img_url = env('APP_URL').'/api/tour/imgh/'.$data->id;
        $data->thumbnail_img_url = env('APP_URL').'/api/tour/imgt/'.$data->id;
        $data->tagsObject = $tempTags;
        $data->countryTagsObject = $tempCountryTags;
        $data->valid_date_end = $end;
        $data->valid_date_start = $start;
        // dd($data);
        return view('pages.backoffice.tourDetail',[
            'data' => $data,
            'tag' => tag::get(),
            'country' => country::get(),
            'supplier' => Supplier::get(),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'pass_minim' => 'required|numeric',
            'pass_limit' => 'required|numeric',
            'days_count' => 'required|numeric',
            'nights_count' => 'required|numeric',
            'start_price' => 'required|numeric',
            'downpayment' => 'required|numeric',
            'valid_date_start' => 'required|date',
            'valid_date_end' => 'required|date',
        ]);
        // dd($request->all());
        $count = ProductTour::max('id');
        $temp = $count+1;
        $path = "";
        $path2 = "";
        if($request->hasFile('header_img')){
            $saveFile = 'header_img_'.$temp.'.jpg';
            $path = $request->file('header_img')->storeAs('public/Tour/Tour'.$temp, $saveFile);
        }
        if($request->hasFile('thumbnail_img')){
            $saveFile = 'thumbnail_img_'.$temp.'.jpg';
            $path2 = $request->file('thumbnail_img')->storeAs('public/Tour/Tour'.$temp, $saveFile);
        }
        if($request->is_domestic == 1){
            $isdom = 'is domestic';
            $dom = 1;
        }else{
            $isdom = 'is international';
            $dom = 0;
        }
        if($request->include_hotel ==1){
            $hotel = 'include hotel';
            $ho = 1;
        }else{
            $hotel = 'not included hotel';
            $ho = 0;
        }
        if($request->include_flight == 1){
            $flight = 'include flight';
            $fl = 1;
        }else{
            $flight = 'not include flight';
            $fl = 0;
        }
        if($request->include_visa == 1){
            $visa = 'include visa';
            $vi = 1;
        }else{
            $visa = 'not include visa';
            $vi = 0;
        }
        $keyword = $request->name.', '.$isdom.', '.$flight.', '.$hotel.', '.$visa.', '.$request->days_count.' days, '.$request->nights_count.' nights, limit '.$request->pass_limit.', '.$request->description;

        $data = ProductTour::create([
            'id' => '',
            'slug' => $request->slug,
            'name' => $request->name,
            'header_img_url' => $path,
            'thumbnail_img_url' => $path2,
            'pass_minim' => $request->pass_minim,
            'start_price' => $request->start_price,
            'is_domestic' => $dom,
            'include_hotel' => $ho,
            'include_flight' => $fl,
            'include_visa' => $vi,
            'include_ride'=> 0,
            'include_ticket' => 0,
            'include_boat' => 0,
            'include_guide' => 0,
            'days_count' => $request->days_count,
            'nights_count' => $request->nights_count,
            'pass_limit' => $request->pass_limit,
            'description' => $request->description,
            'keyword' => $keyword,
            'valid_date_start' => $request->valid_date_start,
            'valid_date_end' => $request->valid_date_end,
            'gimmic_price' => $request->gimmic_price,
            'downpayment' => $request->downpayment,
            'include_visa' => $request->include_visa,
            'supplier_id' => $request->supplier_id,
            'type' => 0,
            'countrytag' => $request->countrytag,
            'tags' => $request->tags,
        ]);
        ProductTourThermcond::create([
            'id' =>'',
            'tour_id' => $data->id,
            'item' => "",
            'text' => ""
        ]);
        return redirect()->back()->with('success','product tour berhasil dibuat');
        // return response()->json(['data' => $data],200);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $data = ProductTour::where('id',$request->id)->first();
        if($request->has('slug'))$data->slug = $request->slug;
        if($request->has('name'))$data->name = $request->name;
        if($request->has('pass_minim'))$data->pass_minim = $request->pass_minim;
        if($request->has('start_price'))$data->start_price = $request->start_price;
        $data->is_domestic = ($request->is_domestic)?1:0;
        $data->include_hotel = ($request->include_hotel)?1:0;
        $data->include_flight = ($request->include_flight)?1:0;
        $data->include_visa = ($request->include_visa)?1:0;
        if($request->has('include_ride'))$data->include_ride = ($request->include_ride)?1:0;
        if($request->has('include_ticket'))$data->include_ticket = ($request->include_ticket)?1:0;
        if($request->has('include_boat'))$data->include_boat = ($request->include_boat)?1:0;
        if($request->has('include_guide'))$data->include_guide = ($request->include_guide)?1:0;
        if($request->has('days_count'))$data->days_count = $request->days_count;
        if($request->has('nights_count'))$data->nights_count = $request->nights_count;
        if($request->has('pass_limit'))$data->pass_limit = $request->pass_limit;
        if($request->has('description'))$data->description = $request->description;
        if($request->has('type'))$data->type = $request->type;
        if($request->has('tags'))$data->tags = $request->tags;
        if($request->has('countrytag'))$data->countrytag = $request->countrytag;
        if($request->has('enabled'))$data->enabled = $request->enabled;
        if($request->hasFile('himg')){
            // $filenameWithExt = $request->file('img')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('img')->getClientOriginalExtension();
            $saveFile = 'tour'.$request->id.'.jpg';
            $path = $request->file('header_img')->storeAs('Tour/Tour'.$request->id.'/imgh', $saveFile);
            dd($path);
            $data->header_img_url = $path;
        }
        if($request->hasFile('thumbnail_img')){
            // $filenameWithExt = $request->file('img')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('img')->getClientOriginalExtension();
            $saveFile = 'tour'.$request->id.'.jpg';
            $path = $request->file('thumbnail_img')->storeAs('Tour/Tour'.$request->id.'/imgt', $saveFile);
            $data->thumbnail_img_url = $path;
        }
        $data->save();
        return redirect()->back();
        // return response()->json(['data' => $data],200);
    }
}
