@extends('layouts.main')

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
    <div class="container mt-3">
        <div class="row justify-content-center" style="min-height: 90vh">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="header" src="{{ asset('images/QuickGoals-black.png') }}"
                                style="width: 210px; margin-top:20px;">
                            <h3 class="mt-3">Tata Cara Penyewaan Lapangan</h3>
                        </div>
                        <ol class="mt-4">
                            <li>"Silakan masuk dengan menekan 'Login', atau daftar dengan menekan 'Daftar' jika belum punya akun."</li>
                            <li>Pilih jenis lapangan yang tersedia (Indoor/Outdoor).</li>
                            <li>Apabila ingin menyewa sepatu atau kostum, Anda dapat memilih opsi penyewaan.</li>
                            <li>Isi formulir penyewaan dengan lengkap dan benar.</li>
                            <li>Lakukan pembayaran sesuai dengan petunjuk yang diberikan.</li>
                            <li>Tunggu konfirmasi dari pihak penyewa.</li>
                        </ol>
                        
                        <div class="card-group mt-4">
                          <div class="card">
                              <div class="card-header text-center">
                                  Biaya Sewa Lapangan - <span><strong>Indoor</strong></span>
                              </div>
                              <div class="card-body">
                                  <ul>
                                      <li>Indoor Reguler : Rp 300.000/Jam</li>
                                      <li>Indoor Matras : Rp 250.000/Jam</li>
                                      <li>Indoor Rumput : Rp 200.000/Jam</li>
                                  </ul>
                              </div>
                          </div>
                      
                          <div class="card">
                              <div class="card-header text-center">
                                  Biaya Sewa Lapangan - <span><strong>Outdoor</strong></span>
                              </div>
                              <div class="card-body">
                                  <ul>
                                      <li>Outdoor Reguler : Rp 250.000/Jam</li>
                                      <li>Outdoor Matras : Rp 200.000/Jam</li>
                                      <li>Outdoor Rumput : Rp 150.000/Jam</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      
                      
                        <div class="card mt-4">
                            <div class="card-header">
                                Biaya Sewa Tambahan
                            </div>
                            <div class="card-body">
                                <p><strong>Sewa Sepatu:</strong> Rp 50.000/Jam</p>
                                <p><strong>Sewa Kostum:</strong> Rp 45.000/Jam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
