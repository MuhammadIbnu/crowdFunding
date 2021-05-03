<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function index(){
        //get data categories
        $categories = Category::latest()->paginate(12);

        return response()->json([
            'success'  => true,
            'message'  => 'List Data Category',
            'data'     =>$categories
        ], 200);
    }

    public function show($slug){
       //get detail data category with campaign
       $category = Category::with('campaigns.user', 'campaigns.sumDonation')->where('slug', $slug)->first();

       if($category) {

           //return with response JSON
           return response()->json([
               'success' => true,
               'message' => 'List Data Campaign Berdasarkan Category : '. $category->name,
               'data'    => $category,
           ], 200);
       }

       //return with response JSON
       return response()->json([
           'success' => false,
           'message' => 'Data Category Tidak Ditemukan!',
       ], 404);
    }

    public function categoryHome(){
        $categories= Category::latest()->take(3)->get();
        return response()->json([
            'success'   => true,
            'message'   => 'List Data Category Home',
            'data'      => $categories
        ], 200);
    }
}
