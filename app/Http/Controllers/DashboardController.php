<?php

namespace App\Http\Controllers;

use App\Models\TokoModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\KeranjangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }
    public function register(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validated = $request->validate([
                'nama' => 'required|max:255',
                'desc' => 'required',
                'notlpn' => 'required|numeric',
                'image' => 'image|file|max:2048'
            ]);

            // Store Gambar
            if ($request->file('image')) {
                $validated['image'] = $request->file('image')->store();
            } else {
                $validated['image'] = 'undraw_profile.svg';
            }
            $validated['users_id'] = Auth::user()->id;
            TokoModel::create($validated);
            return redirect('/dashboard')->with('datachange', 'Akun Toko telah dibuat');
        }
        return view('dashboard.register');
    }
    public function profile()
    {
        return view('dashboard.profile', [
            'toko' => TokoModel::where('users_id', Auth::user()->id)->first()
        ]);
    }
    public function editprofile(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'nama' => 'required|max:255',
                'desc' => 'required',
                'notlpn' => 'required|numeric',
                'image' => 'image|file|max:2048'
            ]);

            if ($request->image == null) {
                $validated['image'] = 'undraw_profile.svg';
            } else {
                if ($request->oldimage && $request->oldimage != 'undraw_profile.svg') {
                    Storage::delete($request->oldimage);
                }
                $validated['image'] = $request->file('image')->store();
            }
            $validated['users_id'] = Auth::user()->id;

            // Ambil id toko via id user
            $toko = TokoModel::where('users_id', Auth::user()->id)->first();
            TokoModel::where('id', $toko->id)
                ->update($validated);
            return redirect('/dashboard/profile')->with('datachange', 'Data telah diupdate');
        }
        return view('dashboard.editprofile', [
            'toko' =>  TokoModel::where('users_id', Auth::user()->id)->first()
        ]);
    }
    public function product()
    {
        // Ambil id toko via id user
        $toko = TokoModel::where('users_id', Auth::user()->id)->first();

        return view('dashboard.product', [
            'product' => ProductModel::where('toko_id', $toko->id)
                ->with('category')
                ->paginate(10)
        ]);
    }
    public function addproduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'nama_product' => 'required',
                'harga' => 'required|numeric',
                'category_id' => 'required',
                'image' => 'image|file|max:2048',
                'desc' => 'required'
            ]);
            $toko = TokoModel::where('users_id', Auth::user()->id)->get();
            $validated['toko_id'] = $toko[0]->id;


            // Store Gambar
            if ($request->file('image')) {
                $validated['image'] = $request->file('image')->store();
            } else {
                $validated['image'] = 'default-product-image.png';
            }
            ProductModel::create($validated);
            return redirect('/dashboard/product')->with('datachange', 'Data telah diupdate');
        }
        return view('dashboard.create', [
            'category' => CategoryModel::all(),
        ]);
    }
    public function editproduct($id)
    {
        return view('dashboard.editproduct', [
            'category' => CategoryModel::all(),
            'product' => ProductModel::find($id)
        ]);
    }
    public function updateproduct(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_product' => 'required',
            'harga' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'desc' => 'required'
        ]);

        if ($request->image == null) {
            $validated['image'] = $request->oldimage;
        } else {
            if ($request->oldimage && $request->oldimage != 'default-product-image.png') {
                Storage::delete($request->oldimage);
            }
            $validated['image'] = $request->file('image')->store();
        }
        ProductModel::where('id', $id)->update($validated);
        return redirect('/dashboard/product')->with('datachange', 'Data telah diupdate');
    }
    public function delete_product($id)
    {
        $product = ProductModel::findOrFail($id);

        if ($product->image == 'default-product-image.png') {
        } else {
            Storage::delete($product->image);
        }


        // Delete product yang ada di keranjang
        KeranjangModel::where('product_id', $product->id)
            ->delete();

        // Delete Product
        ProductModel::destroy($product->id);
        return redirect('/dashboard/product')->with('datachange', 'Data telah Dihapus');
    }
}
