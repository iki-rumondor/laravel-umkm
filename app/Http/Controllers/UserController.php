<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    private $gambarProduct = 'product/product/';
    private $path = "data/profile/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('status'))
        {
            $data = User::find($request->status);
            if($data->status == 'active'){
                $data->update([
                    'status' => 'inactive'
                ]);
            }else{
                $data->update([
                    'status' => 'active'
                ]);
            }
            return redirect()->route('user.index')->with('success','Berhasil');
        }else{
            $data = User::where('id', '!=', Auth::user()->id)->get();
            return view('backend.user.index', compact('data'));

        }
    }

    public function updateStatus(Request $request)
    {
        try {
            User::where('id', $request->id)->update(['status' => $request->status]);
            return redirect()->route('user.index')->with('success','Berhasil');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('success','Gagal');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = User::find($id);
        return view('backend.user.edit', compact('data'));
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
        $user = User::find($id);
        if($user->role == 'admin')
        {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($user) {
                return redirect()->back()->with('success', 'Data berhasil diubah!');
            } else {
                return redirect()->back()->with('error', 'Data gagal diubah!');
            }
        }else{
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $nameImage = $image->hashName();
                $image->move($this->path, $nameImage);
                File::delete($user->profile);
                $request->validate([

                    'profile' => 'mimes:jpg,jpeg,png|max:2048',
                ]);
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'alamat' => $request->alamat,
                    'deskripsi' => $request->deskripsi,
                    'profile' => $this->path . $nameImage,
                ]);
                if ($user) {
                    return redirect()->back()->with('success', 'Data berhasil diubah!');
                } else {
                    return redirect()->back()->with('error', 'Data gagal diubah!');
                }
            } else {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'alamat' => $request->alamat,
                    'deskripsi' => $request->deskripsi,
                ]);
                if ($user) {
                    return redirect()->back()->with('success', 'Data berhasil diubah!');
                } else {
                    return redirect()->back()->with('error', 'Data gagal diubah!');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        File::delete($data->profile);
        $product = Product::all()->where('user_id')->first();
        if ($product) {
            File::delete($this->gambarProduct . $product->image);
            $product->delete();
        }
        $data->shop->delete();
        $data->delete();
        if ($data) {
            return redirect()->route('user.index')->with('success', 'Berhasil hapus');
        } else {
            return redirect()->route('user.index')->with('error', 'Gagal hapus');
        }
    }
}
