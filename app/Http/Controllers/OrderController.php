<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $title = 'Page Data Order';
        $orders = Order::orderBy('created_at', 'DESC')->paginate(7);

        return view('backend.page.order.order', compact(
            'title', 'orders'
        ));
    }

    public function batalkan($id){
        $item = Order::find($id);
        $item->status = 'Canceled';
        $item->save();
    
        return redirect('/')->with('success', 'Pesanan anda Berhasil di Batalkan');
    }

    // function callback
    public function callback(Request $request){
        $serverkey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverkey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement'){
               
                //update status jika berhasil melakukan pembayaran
                $order = Order::where('kode_order',$request->order_id)->first();
                $order->update(['status' => 'paid']);

                // update stok jika sudah berhasil melakukan pembayaran
                $product = Product::where('id',$order->product_id)->first();
                $product->stok = $product->stok - $order->quantity;
                $product->save();



                return redirect('/')->with('success', 'Berhasil melakukan Pembayaran');

            }

        }
    }
}
