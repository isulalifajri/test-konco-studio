@extends('backend.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  
  <span>Selamat Datang di Halaman Dashboard <b>{{ auth()->user()->name }}</b></span>

@endsection