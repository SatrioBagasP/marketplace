<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use App\Models\CategoryModel;
use App\Models\KeranjangModel;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('index', [
            'category' => CategoryModel::all(),
            'product' => ProductModel::search(request(['search', 'category', 'toko']))->paginate(18)
                ->withQueryString(),
        ]);
    }
    public function single($id)
    {
        return view('singleproduct', [
            'product' => ProductModel::findorFail($id)
        ]);
    }
    public function keranjang()
    {
        return view('keranjang', [
            'keranjang' => KeranjangModel::where('users_id', Auth::user()->id)
                ->with('product')
                ->get()
        ]);
    }
    public function addToCart(Request $request)
    {
        $post['product_id'] = $request->id;
        $post['users_id'] = Auth::user()->id;
        $exist = KeranjangModel::where('users_id', Auth::user()->id)->get();
        foreach ($exist as $data) {
            if ($data->product_id == $request->id) {
                return back()->with('error', 'Product sudah ada di keranjang');
            }
        }
        KeranjangModel::create($post);
        return back()->with('datachange', 'Product telah dimasukan ke keranjang');
    }
}
