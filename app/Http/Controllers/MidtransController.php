<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function checkoutMidtrans(Request $request, $id){

        $validatedData = $request->validate([
            'qty' => ['required', 'numeric'],
        ]);

        
        $data = Product::findorFail($id);

        if($data->stok < $validatedData['qty']){
            return back()->with('success-danger', 'Pesanan anda melebihi stok yang ada.');
        }

        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = User::find(auth()->user()->id);

        $id_customer = $user->id;
        $id_product = $data->id;
        $subtotal = $data->price * $validatedData['qty'];
        $kode_order = 'KS-'.str_pad(mt_rand(0, 100), 3, '0', STR_PAD_LEFT) . $id_customer . $id_product;

        $params = array(
            'transaction_details' => array(
                'order_id' => $kode_order,
                'gross_amount' => $subtotal,
            ),
            'customer_details' => array(
                'first_name' => $user->username,
                'last_name' => 'tes',
                'email' => $user->email,
                'phone' => '08111222333',
                'address' => $user->address
            ),
        );

        $createdOrder = [
            'kode_order' => $kode_order,
            'user_id' => $user->id,
            'product_id' => $id_product,
            'quantity' => $validatedData['qty'],
            'unit_price' => $data->price,
            'subtotal' => $subtotal
        ];

        $order = Order::create($createdOrder);

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $title = 'Page Detail Pesanan';

        return view('frontend.page.detail-pesanan', compact(
            'title','order','snapToken'
        ));

    }
}
