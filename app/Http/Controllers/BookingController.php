<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // method untunk menampilkan halaman booking
    public function index(Request $request)
    {
        // berisi data booking user saat ini
        $bs = Booking::where('user_id', Auth::user()->id)->get();
        return view('booking', compact('bs'));
    }

    // menampilkan halaman checkout
    public function checkout(Request $request)
    {
        // melakukan query sesuai jenis & lokasi lapangan yang dipilih
        $selected_lapangan = Lapangan::query()
            ->where('lokasi', $request->lokasi)
            ->where('jenis', $request->jenis)
            ->first();
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        // total durasi dalam satuan menit (date_end - date_start)
        $total_durasi = Carbon::parse($request->date_end)->diffInMinutes($request->date_start);
        $total_harga = ($selected_lapangan->price / 60) * $total_durasi;

        return view('checkout', compact('selected_lapangan', 'date_start', 'date_end', 'total_harga'));
    }

    // melakukan proses booking / checkout
    public function booking(Request $request)
    {
        $selected_lapangan = Lapangan::query()
            ->where('lokasi', $request->lokasi)
            ->where('jenis', $request->jenis)
            ->first();

        // cek apakah ada jadwal booking yang bertubrukan dengan request booking
        $is_exist = Booking::query()
            ->where('lapangan_id', $selected_lapangan->id)
            ->whereBetween('date_start', [$request->date_start, $request->date_end])
            ->orWhereBetween('date_end', [$request->date_start, $request->date_end])
            ->get();

        // dd($is_exist);
        if (count($is_exist) > 0) {
            return back()->with('is_exist', $is_exist);
        }


        // total durasi dalam satuan menit (date_end - date_start)
        $total_durasi = Carbon::parse($request->date_end)->diffInMinutes($request->date_start);
        $total_harga = ($selected_lapangan->price / 60) * $total_durasi;

        Booking::create([
            'lapangan_id' => $selected_lapangan->id,
            'price' => $selected_lapangan->price,
            'total_price' => $total_harga,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/')->with('success-booking');
    }
}
