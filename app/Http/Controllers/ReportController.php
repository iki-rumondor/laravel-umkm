<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use PDF;

class ReportController extends Controller
{
    public function umkm()
    {
        $umkm = Shop::with("user")->with("jenis")->get();
        $data = [
            "umkm" => $umkm
        ];

        return PDF::loadView('backend.report.umkm', $data)->stream('umkm.pdf');
    }

    public function mandiri()
    {
        $umkm = Shop::with("user")->where("jenis_id", 1)->get();
        $data = [
            "title" => "Data UMKM Mandiri Bone Bolango",
            "umkm" => $umkm
        ];

        return PDF::loadView('backend.report.jenis', $data)->stream('mandiri.pdf');
    }
    public function masyarakat()
    {
        $umkm = Shop::with("user")->where("jenis_id", 2)->get();
        $data = [
            "title" => "Data UMKM Kelompok Masyarakat Bone Bolango",
            "umkm" => $umkm
        ];

        return PDF::loadView('backend.report.jenis', $data)->stream('masyarakat.pdf');
    }
    public function usaha()
    {
        $umkm = Shop::with("user")->where("jenis_id", 3)->get();
        $data = [
            "title" => "Data UMKM Badan Usaha Kecil Bone Bolango",
            "umkm" => $umkm
        ];

        return PDF::loadView('backend.report.jenis', $data)->stream('usaha.pdf');
    }

    public function product()
    {
        $product = Product::with("user")->with("category")->get();
        $data = [
            "product" => $product
        ];

        return PDF::loadView('backend.report.product', $data)->stream('product.pdf');
    }
}
