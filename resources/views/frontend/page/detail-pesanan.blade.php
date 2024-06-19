@extends('frontend.layout.app')

@push('midtrans-css')

<script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
    
@endpush

@section('content')
    <div class="card-body">
    <h2>Detail Pesanan</h2>
    <hr>
        <div class="mt-3 mb-5">
            <div class="card w-100 mt-2">
                <div class="card-header">

                    <p>Tanggal Pemesanan :  <b>{{ $order->created_at }}</b> </p>
                    <p>Kode Order :  <b>{{ $order->kode_order }}</b></p>
                </div>
                <div class="card-body">
                    <h3>Detail Pemesan</h3>
                    <p>Nama Pemesan : <b>{{ $order->user->name }}</b></p>
                    <p>Alamat : <b>{{ $order->user->address }}</b></p>
                </div>
                <div class="card-body">
                    <h3>Detail Barang</h3>
                    <p>Nama Product : <b>{{ $order->product->title }}</b></p>
                    <p>Harga Product : <b>{{ $order->product->price }}</b></p>
                    <p>Qty : <b>{{ $order->quantity }}</b></p>
                    <p>Total : <b>{{ $order->priceText }}</b></p>
                </div>
            </div>
            <div class="d-flex gap-1 mt-3">
                {{-- <button id="pay-button" class="btn btn-success">Bayar Sekarang</button> --}}
                <a href="https://app.sandbox.midtrans.com/snap/v4/redirection/{{ $snapToken }}" class="btn btn-success" target="_blank">Bayar Sekarang</a>
                <a href="{{ route('batalkan', $order->id) }}" class="btn btn-info">Batalkan Pesanan</a>
            </div>

            <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
            
            
        </div>
    </div>
    <div id="snap-container"></div>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
      </script>

@endsection