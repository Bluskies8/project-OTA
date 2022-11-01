<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function showStaticImages(Request $request)
    {
        return view('pages.backoffice.staticimage');
    }
}
