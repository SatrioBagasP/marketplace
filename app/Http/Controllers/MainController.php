<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

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
}
