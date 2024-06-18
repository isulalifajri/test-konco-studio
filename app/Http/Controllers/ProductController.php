<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'DESC')->paginate(5);
        $title = 'Halaman Data Product';
        return view('backend.page.product.index', compact(
            'products', 'title'
        ));
    }

    public function updateStatus(Request $request, $id){
        $item = Product::find($id);
        $item->isActive = $request->input('isActive');
        $item->save();
    
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function updateStok(Request $request, $id){
        $item = Product::findOrFail($id);

        $item->stok = $request->input('stok');
        $item->save();

        return redirect()->route('product')->with('success', 'Data Stok updated successfully');
    }

    public function destroy($id){
        $data = Product::find($id);
        $data->destroy($data->id); 
        return redirect('product')->with('success-danger', "Data Deleted Successfully");
    }
}
