@extends('layout.app')

@section('content')
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline mb-3">
        <div class="card-body box-profile">
          <div class="text-center">
            <img src="{{ asset('no-image.jpg') }}"  class="profile-user-img img-fluid img-circle" style="height: 80px; width:80px" alt="default">
          </div>

          <h3 class="profile-username text-center">{{ auth()->user()->username }}</h3>

          <p class="text-muted text-center">{{ auth()->user()->role }}</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills" >
              <li class="nav-item"><a class="nav-link active" role="button" id="updateProfile"><i class="fa fa-user mr-1"></i> Edit Profile</a></li>
              <li class="nav-item"><a class="nav-link" role="button" id="updatePassword"><i class="fa fa-key mr-1"></i> Change
                      Password</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-pane1">
            <form  class="form-horizontal" action="{{ route('profile.update', $data->id) }}" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group">
                <div class="mb-3 row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $data->username) }}" name="username" id="username">
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
  
              <div class="form-group">
                
                  <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $data->email) }}" name="email" id="email">
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
              </div>
  
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i>Save Changes</button>
                </div>
              </div>
            </form>
          </div>


          <div class="tab-pane2 d-none">
            <form  class="form-horizontal" action="{{ route('profile.password', $data->id) }}" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group">
                <div class="mb-3 row">
                  <label for="currentPassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control shw @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}" name="current_password" id="currentPassword" placeholder="masukkan password anda">
                    @error('current_password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
  
              <div class="form-group"> 
                  <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control shw @error('password') is-invalid @enderror" name="password" id="password" placeholder="masukkan password baru anda">
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
              </div>

              <div class="form-group"> 
                  <div class="row">
                    <label for="passwordConfirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control shw @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="passwordConfirmation" placeholder="konfirmasi password baru anda">
                      @error('password_confirmation')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" onclick="myPass()" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Tampilkan Password
                        </label>
                      </div>
                    </div>
                  </div>
              </div>
  
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i>Save Changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
        <!-- /.card -->

      
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection


@push('js')

<script>
   var a = document.getElementById("updateProfile");
   var b = document.getElementById("updatePassword");
   var c = document.querySelector('.tab-pane1');
   var d = document.querySelector('.tab-pane2');

   a.addEventListener('click', function() {
        a.classList.add('active');
        b.classList.remove('active');
        c.classList.remove('d-none');
        d.classList.add('d-none');
   })
   b.addEventListener('click', function() {
        b.classList.add('active');
        a.classList.remove('active');
        c.classList.add('d-none');
        d.classList.remove('d-none');
   })
</script>

<script>
  function myPass() {
      var x = document.querySelectorAll(".shw");
      for(var a=0; a < x.length ; a++){
          if (x[a].type === "password") {
              x[a].type = "text";
          } else {
              x[a].type = "password";
          }
      }
  }
</script>
    
@endpush