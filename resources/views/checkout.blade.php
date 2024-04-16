@extends('layouts.main')
@push('heads')
    <style>
        @font-face {
            font-family: 'Lexend';
            src: url('fonts/Lexend-Medium.ttf');
        }

        body {
            font-family: 'Lexend', sans-serif;
        }

        .text-fit {
            width: 9px;
            white-space: nowrap;
        }

        .custom-table {
            border-collapse: collapse;
            border-radius: 4px;
            overflow: hidden;
        }

        .custom-table th,
        .custom-table td {
            padding: 8px;
            border: 2px solid #dddddd;
        }
    </style>
@endpush
@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Detail Booking Anda</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-fit fw-bold">Jenis</td>
                                    <td class="text-fit">:</td>
                                    <td>{{ $selected_lapangan->jenis }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Lokasi</td>
                                    <td class="text-fit">:</td>
                                    <td>{{ $selected_lapangan->lokasi }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-fit">Harga perjam</td>
                                    <td class="text-fit">:</td>
                                    <td>Rp. {{ number_format($selected_lapangan->price) }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-fit">Tgl Mulai</td>
                                    <td class="text-fit">:</td>
                                    <td>
                                        <input class="form-control py-0" type="datetime-local" name="date_start"
                                            id="" value="{{ $date_start }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-fit">Tgl Selesai</td>
                                    <td class="text-fit">:</td>
                                    <td>
                                        <input class="form-control py-0" type="datetime-local" name="date_end"
                                            id="" value="{{ $date_end }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h4 class="d-flex justify-content-between">
                            <span>Total Harga</span>
                            <span class="text-primary fw-bold">Rp. {{ number_format($total_harga) }}</span>
                        </h4>

                        <button class="btn btn-primary w-100 mt-3" type="submit">Booking</button>
                    </form>

                </div>
            </div>

        </div>

        @if (session('is_exist')[0] ?? false)
            <div class="col-lg-7">
                <div class="alert alert-danger" role="alert">
                  Jadwal dan Lapangan ini sudah dipesan oleh orang lain, silakan pilih jadwal lain.
                </div>
                <table class="table custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Tgl Mulai</th>
                            <th scope="col">Tgl Selesai</th>
                            <th scope="col">Nama Pemesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('is_exist') as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->lapangan->lokasi }}</td>
                                <td>{{ $b->lapangan->jenis }}</td>
                                <td>{{ $b->date_start }}</td>
                                <td>{{ $b->date_end }}</td>
                                <td>{{ $b->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
