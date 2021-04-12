<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donatur;

class DonaturController extends Controller
{
    //
    public function index(){

        $donaturs = Donatur::latest()->when(request()->q, function($donaturs){
            $donaturs = $donatur->where('name', 'like', '%'. request()->q. '%');
        })->paginate(10);
        return view('admin.donatur.index', compact('donaturs'));
    }
}
