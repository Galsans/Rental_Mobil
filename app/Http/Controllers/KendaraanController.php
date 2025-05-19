<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::with('category')->get();
        return view('admin.kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.kendaraan.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "nama_kendaraan" => 'required',
            "deskripsi" => 'required',
            "category_id" => 'required|exists:categories,id',
            "status" => 'required|in:tersedia,tidak tersedia',
            "plat_nomor" => 'required',
            "tahun" => 'required',
            "harga" => 'required',
            "img" => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp'  // Added validation for the image
        ]);

        // If validation fails, redirect back with errors and input
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Prepare the input data
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        // Handle the file upload
        if ($request->hasFile('img')) {
            $input['img'] = $request->file('img')->store('public/kendaraan');
        } else {
            // If the image is not uploaded, handle it (e.g., set a default image or throw an error)
            return redirect()->back()->withErrors(['img' => 'Image upload failed'])->withInput();
        }

        // Create a new Kendaraan record
        Kendaraan::create($input);

        // Redirect to the index route
        return redirect()->route('kendaraan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kendaraan = Kendaraan::with('category')->find($id);
        return view('admin.kendaraan.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $kendaraan = Kendaraan::find($id);
        return view('admin.kendaraan.edit', compact(['kendaraan', 'category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::find($id);

        // Pengkondisian jika gambar kosong maka yang akan di update adalah selain field img
        if ($request->img == '') {
            $kendaraan->nama_kendaraan = $request->nama_kendaraan;
            $kendaraan->deskripsi = $request->deskripsi;
            $kendaraan->category_id = $request->category_id;
            $kendaraan->status = $request->status;
            $kendaraan->plat_nomor = $request->plat_nomor;
            $kendaraan->tahun = $request->tahun;
            $kendaraan->harga = $request->harga;
            $kendaraan->save();
        } else {
            $kendaraan->nama_kendaraan = $request->nama_kendaraan;
            $kendaraan->deskripsi = $request->deskripsi;
            $kendaraan->category_id = $request->category_id;
            $kendaraan->status = $request->status;
            $kendaraan->plat_nomor = $request->plat_nomor;
            $kendaraan->tahun = $request->tahun;
            $kendaraan->harga = $request->harga;
            $kendaraan->img = $request->file('img')->store('public/kendaraan');
            $kendaraan->save();
        }

        return redirect()->route('kendaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::find($id)->delete();
        return redirect()->route('kendaraan.index');
    }
}
