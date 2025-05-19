<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kendaraan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('user.kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kendaraan_id)
    {
        $kendaraan = Kendaraan::findOrFail($kendaraan_id);
        return view('user.booking.create', compact('kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|unique:bookings,email',
        //     'no_wa' => 'required|numeric',
        //     'ktp' => 'required|image|mimes:jpeg,png,jpg',
        //     'nik' => 'required|string|max:255|unique:bookings,nik',
        //     'alamat' => 'required|string|max:255',
        //     'kendaraan_id' => 'required|exists:kendaraans,id',
        //     'tanggal_awal' => 'required|date|after_or_equal:today',
        //     'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',

        // ]);

        // $booking = new Booking();
        // $booking->kendaraan_id = $request->kendaraan_id;
        // $booking->user_id = Auth::id();
        // $booking->email = $request->email;
        // $booking->nik = $request->nik;
        // $booking->name = $request->name;
        // $booking->no_wa = $request->no_wa;
        // if ($request->hasFile('ktp')) {
        //     $booking->ktp = $request->file('ktp')->store('public/ktp');
        // }
        // $booking->alamat = $request->alamat;
        // $booking->tanggal_awal = $request->tanggal_awal;
        // $booking->tanggal_akhir = $request->tanggal_akhir;
        // $booking->save();

        // $kendaraan = Kendaraan::find($request->kendaraan_id);
        // $kendaraan->status = 'tidak tersedia';
        // $kendaraan->save();

        // return redirect()->route('booking.index')->with('success', 'Booking successful.');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:bookings,email',
            'no_wa' => 'required|numeric',
            'ktp' => 'required|image|mimes:jpeg,png,jpg',
            'nik' => 'required|string|max:255|unique:bookings,nik',
            'alamat' => 'required|string|max:255',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_awal' => 'required|date|after_or_equal:today',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        // Check if the vehicle is available for booking
        $kendaraan = Kendaraan::find($request->kendaraan_id);

        if ($kendaraan->status === 'tersedia') {
            $booking = new Booking();
            $booking->kendaraan_id = $request->kendaraan_id;
            $booking->user_id = Auth::id();
            $booking->email = $request->email;
            $booking->nik = $request->nik;
            $booking->name = $request->name;
            $booking->no_wa = $request->no_wa;

            if ($request->hasFile('ktp')) {
                $booking->ktp = $request->file('ktp')->store('public/ktp');
            }

            $booking->alamat = $request->alamat;
            $booking->tanggal_awal = $request->tanggal_awal;
            $booking->tanggal_akhir = $request->tanggal_akhir;
            $booking->save();

            // Update vehicle status to 'tidak tersedia'
            $kendaraan->status = 'tidak tersedia';
            $kendaraan->save();

            return redirect()->route('booking.index')->with('success', 'Booking successful.');
        } else {
            return redirect()->back()->with('error', 'Sorry, the vehicle is not available for booking.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Booking::with(['kendaraan', 'user'])->find($id);
        // Hitung total hari
        $tanggal_awal = \Carbon\Carbon::parse($book->tanggal_awal);
        $tanggal_akhir = \Carbon\Carbon::parse($book->tanggal_akhir);
        $total_hari = $tanggal_awal->diffInDays($tanggal_akhir) + 1; // Tambahkan 1 hari untuk inklusif

        // Hitung total pembayaran
        $total_pembayaran = $total_hari * $book->kendaraan->harga;
        return view('user.booking.show', compact(['book', 'total_pembayaran']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        $kendaraans = Kendaraan::where('status', 'tersedia')->get(); // Get only available vehicles
        return view('user.booking.edit', compact('booking', 'kendaraans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_wa' => 'required|numeric',
            'nik' => 'required|string|max:255',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Nullable if not changing KTP
            'alamat' => 'required|string|max:255',
            'kendaraan_id' => 'nullable|exists:kendaraans,id', // Make it nullable
            'tanggal_awal' => 'required|date|after_or_equal:today',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        $booking = Booking::findOrFail($id);
        $oldKendaraanId = $booking->kendaraan_id;

        // Only update kendaraan_id if it's provided in the request
        if ($request->has('kendaraan_id') && $request->kendaraan_id != $oldKendaraanId) {
            $booking->kendaraan_id = $request->kendaraan_id;
            // Update the status of the old kendaraan
            $oldKendaraan = Kendaraan::find($oldKendaraanId);
            $oldKendaraan->status = 'tersedia';
            $oldKendaraan->save();

            // Update the status of the new kendaraan
            $newKendaraan = Kendaraan::find($request->kendaraan_id);
            $newKendaraan->status = 'tidak tersedia';
            $newKendaraan->save();
        }

        $booking->email = $request->email;
        $booking->nik = $request->nik;
        $booking->name = $request->name;
        $booking->no_wa = $request->no_wa;
        $booking->alamat = $request->alamat;
        $booking->tanggal_awal = $request->tanggal_awal;
        $booking->tanggal_akhir = $request->tanggal_akhir;

        if ($request->hasFile('ktp')) {
            $booking->ktp = $request->file('ktp')->store('public/ktp');
        }

        $booking->save();

        return redirect()->route('booking.book')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the booking and ensure it exists
        $booking = Booking::findOrFail($id);

        // Get the associated kendaraan_id
        $kendaraanId = $booking->kendaraan_id;

        // Delete the booking
        $booking->delete();

        // Find the associated kendaraan and update its status to 'tersedia'
        $kendaraan = Kendaraan::find($kendaraanId);
        if ($kendaraan) {
            $kendaraan->status = 'tersedia';
            $kendaraan->save();
        }

        return redirect()->route('booking.book')->with('success', 'Booking deleted successfully.');
    }

    public function book()
    {
        $userId = Auth::id(); // Get the current authenticated user's ID
        $book = Booking::with('kendaraan')->where('user_id', $userId)->get();
        return view('user.booking.index', compact('book'));
    }

    public function payment()
    {
        $kendaraans = Kendaraan::where('status', 'tersedia')->get();
        return view('booking.create', compact('kendaraans'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date|after_or_equal:today',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'kendaraan_id' => 'required|exists:kendaraans,id',
        ]);

        // Ambil data kendaraan berdasarkan ID
        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);

        // Hitung jumlah hari antara tanggal_awal dan tanggal_akhir
        $tanggalAwal = Carbon::parse($request->tanggal_awal);
        $tanggalAkhir = Carbon::parse($request->tanggal_akhir);
        $jumlahHari = $tanggalAwal->diffInDays($tanggalAkhir) + 1; // tambahkan +1 untuk memasukkan hari terakhir

        // Hitung total pembayaran berdasarkan harga per hari kendaraan
        $totalPembayaran = $jumlahHari * $kendaraan->harga;

        // Simpan data pembayaran atau lakukan operasi lainnya sesuai kebutuhan
        $booking = new Booking();
        $booking->kendaraan_id = $kendaraan->id;
        $booking->user_id = auth()->id(); // asumsikan menggunakan user yang sedang login
        $booking->tanggal_awal = $tanggalAwal;
        $booking->tanggal_akhir = $tanggalAkhir;
        $booking->jumlah_hari = $jumlahHari;
        $booking->total_pembayaran = $totalPembayaran;
        $booking->save();

        // Redirect atau berikan response sesuai kebutuhan aplikasi
        return redirect()->route('booking.index')->with('success', 'Pembayaran berhasil dilakukan.');
    }
}
