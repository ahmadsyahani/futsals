@extends('layouts.auth')
@section('content')
<style>
  @font-face {
      font-family: 'Lexend';
      src: url('fonts/Lexend-Medium.ttf');
  }

  body {
      font-family: 'Lexend', sans-serif;
  }

  .back-image {
      position: absolute;
      z-index: -1;
      width: 100%;
      height: 100%;
      filter: blur(2px);
  }
</style>

  <div class="col-4">
    @if (session('failed'))
      <div class="alert alert-danger" role="alert">
        {{ session('failed') }}
      </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h4 class="text-center">Login</h4>
      </div>
      <div class="card-body">
        <form method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email">
          </div>
          <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <button class="btn btn-primary w-100">Login</button>
          <p class="mt-3 mb-0 text-center">Belum punya akun ? <a href="{{ route('regis.view') }}">Registrasi</a></p>
        </form>
      </div>
    </div>
  </div>
@endsection
