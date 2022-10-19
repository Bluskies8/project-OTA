<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\ProductTour;
use App\Models\Supplier;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function showAlltour()
    {
        $data = ProductTour::get();
        return view('pages.backoffice.tour',[
            'data' => $data,
            'tag' => Tag::get(),
            'country' => country::get(),
            'supplier' => Supplier::get(),
        ]);
    }
}
