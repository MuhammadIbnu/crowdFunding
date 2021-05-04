<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function index(){
        $sliders = Slider::latest()->get();
        return response()->json([
            'status'    => true,
            'message'   =>'list data slider',
            'data'      => $sliders
        ], 200);

    }
}
