<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        return view('backend.dashboard.index',[
            
            'countSlider' => Slider::all()->count(),
            'countProduct' => Auth::user()->role != 'admin' ? Product::all()->where('user_id',Auth::user()->id)->count() : Product::all()->count(),
            'countCategory' => Category::all()->count(),
            'adminCount' => User::all()->count()
        ]);
    }
}
