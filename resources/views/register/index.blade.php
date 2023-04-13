@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-5">
            
            <main class="form-registration w-100 m-auto">
                
                <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>

              <form action="/register" method="post">
                @csrf 
                {{-- csrf untuk mengenerate token agar tidak terjadi cross-site lihat di dokumentasi laravel --}}
                {{-- Token tersebut berfungsi untuk menentukan apakah permintaan yang masuk berasal dari pengguna yang memiliki otoritas atau bukan --}}
                <div class="form-floating">
                  <input type="text" name="name" class="form-control rounded-top @error ('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}"> 
                  {{-- value old name digunakan agar user tidak perlu mengisikan kembali nilai yang mereka inputkan sebelumnya / tidak di reset kosong lagi --}}
                  {{-- untuk @error maksudnya jika name didalam contohnya username/name ada error maka tampilkan invalid menggunakan is-invalid jika tidak sudah tidak ada maka @enderror --}}
                  <label for="name">Name</label>
                  {{-- menampilkan pesan error --}}
                  @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" name="username" class="form-control @error ('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                  <label for="username">Username</label>
                  {{-- menampilkan pesan error --}}
                  @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  <label for="email">Email address</label>
                  {{-- menampilkan pesan error --}}
                  @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control rounded-bottom @error ('password') is-invalid @enderror" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                  {{-- menampilkan pesan error --}}
                  @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
            
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>

                {{-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p> --}}
              </form>

              <small class="d-block text-center mt-3">Already have account? <a href="/login">Login</a> </small>
              
            </main>
        </div>
    </div>


@endsection