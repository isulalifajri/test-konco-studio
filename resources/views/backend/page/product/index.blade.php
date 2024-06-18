@extends('backend.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Product</h1>
  </div>

  <h2>List Data Product</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">A/N</th>
              <th scope="col">Status</th>
              <th scope="col">Stok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($products as $paginate => $item)
                <tr>
                    <td>{{ $products->firstItem() + $paginate }}</td>
                    <td><img src="{{ $item->image }}" alt="" width="70px"></td>
                    <td class="align-middle">{{ $item->title }}</td>
                    <td class="align-middle">
                        <form action="{{ route('updateStatus', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-check form-switch">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="flexSwitchCheckChecked{{ $item->id }}" 
                                    name="isActive" 
                                    value="1" 
                                    {{ $item->isActive == 1 ? 'checked' : '' }} 
                                    onchange="this.form.submit()">
                            </div>
                            <input type="hidden" name="isActive" value="{{ $item->isActive == 1 ? 0 : 1 }}">
                        </form>
                    <td class="align-middle"> <span class="badge {{ $item->isActive == '1' ? 'bg-primary' : 'bg-info'  }}">{{ $item->isActive == '1' ? 'Active' : 'Tidak Active'  }}</span></td>
                    <td class="align-middle">
                        <div class="d-table-cell w-100">
                            <div class="text-center">
                                <span><b>{{ $item->stok }}</b></span> <br>
                            </div>
                            <button class="btn badge bg-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"> 
                                <i class="bx bx-detail me-2"></i> Update Stok
                            </button>
                        </div>
                    </td>
                    <td class="align-middle">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <p>Tidak Ada Data</p>
                </tr>
            @endforelse
            
          </tbody>
        </table>

        {{ $products->links('pagination::bootstrap-5') }}
      </div>


      {{-- Modal Update Stok --}}
      @foreach ($products as $item)
      <div class="modal" id="exampleModal{{ $item->id }}" tabindex="-1" style="padding-top:0px ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary">Update Stok Produk Ini</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateStok', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                    <div class="modal-body" style="overflow-wrap: anywhere;">
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Product</label>
                            <input type="text" class="form-control" id="title" value="{{ $item->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" value="{{ $item->stok }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                    
                        <button type="submit" class="btn btn-info">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    @endforeach

@endsection