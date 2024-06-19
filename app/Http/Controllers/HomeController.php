<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::where('isActive',1)->orderBy('created_at','DESC')->paginate(10);
        return view('frontend.page.home', [
            'title' => 'Halaman Home',
            'products' => $products,
        ]);
    }

    public function detailProduct($id){
        $data = Product::findorFail($id);
        return view('frontend.page.detail-product', [
            'title' => 'Halaman Detail Product',
            'data' => $data,
        ]);
    }
}
