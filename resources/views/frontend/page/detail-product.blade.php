@extends('frontend.layout.app')

@section('content')
<div class="card-body">
 <h2>Detail Product</h2>
 <hr>
    <div class="mt-3">
        <div class="d-flex flex-wrap gap-2 mt-2 mb-5">
            <div class="card">
                <div class="d-flex flex-wrap gap-5">
                        <div class="col-md-4">
                            <img src="{{ $data->products_url }}" class="card-img-top" alt="user default" style="border: 1px solid #e7e0e0;">
                        </div>
                        <div class="col-md-5 mt-2">
                            <h2>{{ $data->title }}</h2>
                            <span class="mt-2 badge {{ $data->stok < 1 ? 'bg-primary' : 'bg-info'  }}">{{ $data->stok < 1 ? 'Tidak Tersedia' : 'Tersedia'  }}</span>
                            <h1 class="mt-3">{{ $data->priceText }}</h1>
                            <p class="mt-4">Stok yang Tersedia : <b>{{ $data->stok }}</b></p>

                            <div class="d-block mt-5">
                                <form action="">
                                    <button class="btn btn-success" {{ $data->stok < 1 ? 'disabled' : ''  }}>Checkout Sekarang</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card w-100">
                <div class="card-body">
                    <h3>Description</h3>
                    <p>{{ $data->description }}</p>
                </div>
            </div>
        </div>
       
    </div>
</div>

@endsection