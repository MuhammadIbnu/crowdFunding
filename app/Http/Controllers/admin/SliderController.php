<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    public function index(){
        $slider = Slider::latest()->paginate(5);
        return view('admin.slider.index',compact('slider'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'link'  => 'required' 
        ]); 
 
        //upload image
        $image = $request->file('image');
        $image->storeAs('public/sliders', $image->hashName());
 
        //save to DB
        $slider = Slider::create([
            'image'  => $image->hashName(),
            'link'   => $request->link
        ]);
 
        if($slider){
             //redirect dengan pesan sukses
             return redirect()->route('admin.slider.index')->with(['success' => 'Data Berhasil Disimpan!']);
         }else{
             //redirect dengan pesan error
             return redirect()->route('admin.slider.index')->with(['error' => 'Data Gagal Disimpan!']);
         }

    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('local')->delete('public/sliders/'.basename($slider->image));
        $slider->delete();

        if($slider){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

}
