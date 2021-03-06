<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    //
    public function index(){
        return view('admin.donation.index');
    }

    public function filter(Request $request){
        $this->validate($request,[
            'date_form' => 'required',
            'date_tp'   =>  'required'
        ]);

        $date_form = $request->date_form;
        $date_to   = $request->date_to;
        //get data donasi by range
        $donations =Donation::where('status','success')->whereDate('created_at','=>', $request->data_form)->whereDate('create_at','<=', $request->date_to)->get();
        //get total donasi by range date
        $total = Donation::where('status','success')->whereDate('created_at','=>',$request->data_form)->whereDate('created_at','<=', $request->date_to)->sum('amount');

        return view('admin.donation.index', compact('donations','total'));
    }
}
