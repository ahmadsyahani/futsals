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

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
        </ol>
    </nav>

    <div class="card mt-3">
        <div class="card-header mt-3">
            <h3>RIWAYAT TRANSAKSI</h3>
        </div>
        <div class="card-body">
            <table class="table mt-2" style="border-radius: 10px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Penyewa</th>
                        <th>Jenis</th>
                        <th>Lokasi</th>
                        <th>Harga perjam</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->user->name }}</td>
                            <td>{{ $b->lapangan->jenis }}</td>
                            <td>{{ $b->lapangan->lokasi }}</td>
                            <td>Rp. {{ number_format($b->lapangan->price) }}</td>
                            <td>Rp. {{ number_format($b->total_price) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
