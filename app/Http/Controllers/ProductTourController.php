<?php

namespace App\Http\Controllers;

use App\Models\ProductTour;
use App\Models\ProductTourPhoto;
use Illuminate\Http\Request;

class ProductTourController extends Controller
{
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

    public function showPhoto($id)
    {
        $data = ProductTourPhoto::where('id',$id)->first();
        return response()->file(storage_path('/app/public'.$data->img_url));
    }
    public function showAllPhoto($id)
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
}
