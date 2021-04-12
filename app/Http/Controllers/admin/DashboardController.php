<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Donatur;
class DashboardController extends Controller
{
    //
    
        public function index(){
            //jumlah donatur
            $donaturs = Donatur::count();
            //jumlah donation
            $campaigns = Campaign::count();
            //jumlah campaign
            $donations = Donation::where('status','success')->sum('amount');
            return view('admin.dashboard.index', compact('donaturs','donations','campaigns'));
        }
    
}
