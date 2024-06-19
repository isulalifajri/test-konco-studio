@extends('backend.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Order</h1>
  </div>

  <h2>List Data Order</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Order</th>
              <th scope="col">Name</th>
              <th scope="col">Product Name</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
              <th scope="col">Tgl Order</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($orders as $paginate => $item)
                <tr>
                    <td>{{ $orders->firstItem() + $paginate }}</td>
                    <td class="align-middle">{{ $item->kode_order }}</td>
                    <td class="align-middle">{{ $item->user->username }}</td>
                    <td class="align-middle">{{ $item->product->title }}</td>
                    <td class="align-middle">{{ $item->priceText }}</td>
                    <td class="align-middle">
                        <span class="badge {{ $item->status == 'Unpaid' ? 'bg-primary' : ($item->status == 'Paid' ? 'bg-info' : 'bg-secondary') }}">
                            {{ $item->status }}
                        </span>
                    </td>                    
                    <td class="align-middle">{{ $item->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <p>Tidak Ada Data</p>
                </tr>
            @endforelse
            
          </tbody>
        </table>

        {{ $orders->links('pagination::bootstrap-5') }}
      </div>

@endsection