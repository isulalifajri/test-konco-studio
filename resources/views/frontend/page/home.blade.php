@extends('frontend.layout.app')

@section('content')
<div class="card-body">
    @php
        $hour = date("G");
        if ((int)$hour >= 0 && (int)$hour <= 10) {
            $greet = "Selamat Pagi";
        } else if ((int)$hour >= 11 && (int)$hour <= 14) {
            $greet = "Selamat Siang";
        } else if ((int)$hour >= 15 && (int)$hour <= 17) {
            $greet = "Selamat Sore";
        } else if ((int)$hour >= 18 && (int)$hour <= 23) {
            $greet = "Selamat Malam";
        } else {
            $greet = "Welcome,";
        }
    @endphp
    @auth
        <h5>Halo, {{ $greet }} {{  auth()->user()->username  }}  @can('admin') as Admin @endcan</h5>
    @else
        <h5>Halo, {{ $greet }} </h5>
    @endauth
</div>

@endsection