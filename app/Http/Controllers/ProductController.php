<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'DESC')->paginate(5);
        $title = 'Halaman Data Product';
        return view('backend.page.product.index', compact(
            'products', 'title'
        ));
    }

    public function create(){
        $title = 'Pages Create Products';
        $data = new Product();
        return view('backend.page.product.create', compact(
            'title', 'data',
        ));
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stok' => ['required','numeric'],
            'image' => ['required','image','file']
        ];

      
        
        $validatedData = $request->validate($rules);
        $validatedData['price'] = str_replace('.','',$request->price);

        $dt = date('Y-m-d_His_a');

        if($request->file('image')){
            $names =  implode("",array_slice(explode(" ", $request->title),0 , 2)); // 2 dalam explode di gunakan untuk mengambail 2 kata pertama dalam request name
            $extension = $request->file('image')->extension();
            $nama_file = $names . "_" . $dt . "." . $extension;

            $request->file('image')->move('backend/assets/images/products', $nama_file); //this for move to directory file with original name
            $validatedData['image'] = $nama_file; //this for create name images in database
        }


        Product::create($validatedData);

        return redirect('product')->with('success', 'Product Baru Berhasil di tambahkan');
    }

    public function edit($id){
        $data = Product::find($id);
        $title = 'Edit Product';

        return view('backend.page.product.edit', compact(
            'title', 'data',
        ));
    }

    public function update(Request $request, $id){
        $data = Product::find($id);
        $rules = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stok' => ['required','numeric'],
            'image' => ['required','image','file']
        ];

        $dt = date('Y-m-d_His_a');

        $validatedData = $request->validate($rules);
        
        $validatedData['price'] = str_replace('.','',$request->price);




        if($request->file('image')){
            if($data->images){
                File::delete('backend/assets/images/products/'.$data->images);
                $data->images = $request->file('image')->getClientOriginalName();
            }
            $names =  implode("",array_slice(explode(" ", $request->title),0 , 2)); // 2 dalam explode di gunakan untuk mengambail 2 kata pertama dalam request name
            $extension = $request->file('image')->extension();
            $nama_file = $names . "_" . $dt . "." . $extension;

            $request->file('image')->move('backend/assets/images/products', $nama_file); //this for move to directory file with original name
            $validatedData['image'] = $nama_file; //this for create name images in database
        }


        Product::find($data->id)->update($validatedData);
       
        return redirect('product')->with('success', "Data Updated Successfully");
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

        File:: delete('backend/assets/images/products/'.$data->image);

        $data->destroy($data->id); 
        return redirect('product')->with('success-danger', "Data Deleted Successfully");
    }
}
