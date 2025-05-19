<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        $user = User::all();
        $kendaraan = Kendaraan::all();
        return view('home', compact(['category', 'user', 'kendaraan']));
    }
}
