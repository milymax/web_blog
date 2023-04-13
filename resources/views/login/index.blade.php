@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-md-4">
          
          {{-- session : jika sukses registrasi tampilkan halaman login --}}
          @if (session()->has('successRegister'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('successRegister') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          
          {{-- session : jika gagal login tampilkan error di halaman login --}}
          @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

            <main class="form-signin w-100 m-auto">
                
              <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
              <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                  <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                  <label for="email">Email address</label>
                  @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
              </form>

              <small class="d-block text-center mt-3">Don't have any account? <a href="/register">Register Here</a> </small>
              
            </main>
        </div>
    </div>


@endsection