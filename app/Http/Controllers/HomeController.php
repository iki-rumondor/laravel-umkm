<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JenisUmkm;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Shop;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{

    public function index()
    {
        Artisan::call('optimize:clear');

        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        $slider = Slider::all();
        $umkm = JenisUmkm::all();
        $toko = Shop::with("user")->with("jenis")->get();
        $product  = Product::with('category', 'user')
            ->join("shops", "shops.user_id", "=", "products.user_id")
            ->take(5)->get();
        return view('frontend.beranda.index', compact('toko', 'app', 'kategori', 'product', 'slider', 'umkm'));
    }


    public function category($id)
    {
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        $data = Category::with('product')->where('slug', $id)->get();
        if ($data->isEmpty()) {
            abort(404);
        } else {
            $name = $data[0]->name;
            return view('frontend.kategori.index', compact('app', 'data', 'kategori', 'name'));
        }
    }

    public function product(Request $request, $id)
    {
        $data = Product::all()->where('slug', $id)->first();
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        return view('frontend.detail.index', compact('app', 'data', 'kategori'));
    }

    public function all_product()
    {
        $data = Product::paginate(10);
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        return view('frontend.all.index', compact('app', 'data', 'kategori'));
    }

    public function search(Request $request)
    {
        $search = $request->get('q');
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        $check = Product::where('name', 'like', '%' . $search . '%');
        if ($check->count() > 0) {
            $data = $check->paginate(10);
            return view('frontend.all.index', compact('app', 'data', 'kategori'));
        } else {
            return view('frontend.404.index', compact('app', 'kategori'));
        }
    }

    public function category_all()
    {
        $data = Category::all();
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        return view('frontend.kategori.all', compact('app', 'data', 'kategori'));
    }

    public function about()
    {
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        return view('frontend.about.index', compact('app', 'kategori'));
    }

    public function umkm($id)
    {
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        $datas = JenisUmkm::all()->where('slug', $id)->first();
        $data  = Product::with('category', 'user')->where('jenis_umkm_id', $datas->id)->get();
        $name = $datas->name;
        return view('frontend.umkm.index', compact('data', 'name', 'app', 'kategori'));
    }

    public function toko($id)
    {
        $user  = User::findOrFail($id);
        $app = Setting::all()->first();
        $kategori = Category::all()->take(5);
        $data =  Product::with('category', 'user')->where('user_id', $id)->paginate(10);
        return view('frontend.toko.index', compact('data', 'app', 'kategori', 'user'));
    }
}
