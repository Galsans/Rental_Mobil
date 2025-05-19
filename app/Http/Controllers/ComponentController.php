<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Kendaraan;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComponentController extends Controller
{
    public function welcome()
    {
        $category = Category::all();
        $user = User::where('role', 'pegawai')->count();
        $client = User::where('role', 'user')->count();
        $kendaraan = Kendaraan::all();
        $booking = Booking::all();
        $admin = User::where('role', 'admin')->get();

        return view('welcome', compact(['category', 'user', 'kendaraan', 'client', 'booking', 'admin']));
    }

    public function bookingAdmin()
    {
        $booking = Booking::with(['kendaraan', 'user'])->get();
        return view('admin.booking.index', compact('booking'));
    }

    public function show($id)
    {
        $booking = Booking::with('kendaraan')->findOrFail($id);

        // Hitung total hari
        $tanggal_awal = \Carbon\Carbon::parse($booking->tanggal_awal);
        $tanggal_akhir = \Carbon\Carbon::parse($booking->tanggal_akhir);
        $total_hari = $tanggal_awal->diffInDays($tanggal_akhir) + 1; // Tambahkan 1 hari untuk inklusif

        // Hitung total pembayaran
        $total_pembayaran = $total_hari * $booking->kendaraan->harga;

        return view('admin.booking.show', compact('booking', 'total_hari', 'total_pembayaran'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status_payment' => 'sudah bayar',
        ]);

        return redirect()->route('admin.booking.index')->with('success', 'Booking payment confirmed successfully.');
    }


    public function batal($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status_payment' => 'belum bayar',
        ]);

        return redirect()->route('admin.booking.index')->with('success', 'Booking payment deleted successfully.');
    }


    public function destroy(Booking $booking)
    {
        if ($booking->isOverdue()) {
            $booking->delete();
            return redirect()->route('admin.booking.index')->with('success', 'Booking deleted successfully.');
        } else {
            return redirect()->route('admin.booking.show', $booking->id)->with('error', 'Booking cannot be deleted before the return date has passed.');
        }
    }

    public function message(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required',
            "subject" => 'required',
            "message" => 'required',
        ]);

        // If validation fails, redirect back with errors and input
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Prepare the input data
        Message::create($request->all());

        // Redirect to the index route
        return redirect()->route('welcome')->with('success', 'Send Message Successfully.');
    }



    public function chat()
    {
        $chat = Message::all();
        return view('admin.chat.index', compact('chat'));
    }

    public function chat_destroy($id)
    {
        $chat = Message::findOrFail($id); // Gunakan findOrFail agar throw 404 jika tidak ditemukan
        $chat->delete();
        return back()->with('success', 'Message deleted successfully');
    }
}
