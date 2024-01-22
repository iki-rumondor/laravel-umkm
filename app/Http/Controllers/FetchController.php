<?php

namespace App\Http\Controllers;

use App\Models\Shop;

class FetchController extends Controller
{
    public function findShopByUserID($userID)
    {
        $umkm = Shop::with("user")->with("jenis")->where('user_id', $userID)->first();
        return response()->json($umkm);
    }
}
