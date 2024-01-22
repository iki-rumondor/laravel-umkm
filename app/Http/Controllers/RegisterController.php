<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JenisUmkm;
use App\Models\Setting;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe = JenisUmkm::all();
        $kategori = Category::all()->take(5);
        $app = Setting::all()->first();
        return view('auth.register', compact('app', 'kategori', 'tipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
            'confirm' => 'required|same:password',
            'jenis' => 'required',
            'nama_toko' => 'required',
            'alamat' => 'required',
            'tahun_berdiri' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'role' => 'owner'
            ]);

            $shop = new Shop([
                'jenis_id' => $request->jenis,
                'nama_toko' => $request->nama_toko,
                'alamat' => $request->alamat,
                'tahun_berdiri' => $request->tahun_berdiri,
            ]);

            $user->shop()->save($shop);

            DB::commit();

            return redirect()->route('login')->with('success', 'Berhasil Register');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->route('register')->with('error', 'Gagal Register');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
