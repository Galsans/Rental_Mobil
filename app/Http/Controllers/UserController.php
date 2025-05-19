<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.user.index', compact('users'));
    }

    public function pegawai()
    {
        $pegawai = User::where('role', 'pegawai')->get();
        return view('admin.user.pegawai', compact('pegawai'));
    }

    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        User::create($input);
        return redirect()->route('admin.user.pegawai');
    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // public function update(Request $request)
    // {
    //     $user = Auth::user();

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //         'no_wa' => 'required|numeric',
    //         'img' => 'nullable|mimes:png,jpg,jpeg', // Added max size validation for the image
    //     ]);

    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->no_wa = $request->no_wa;
    //     $user->about = $request->about;

    //     if ($request->hasFile('img')) {
    //         // Delete the old image if exists
    //         if ($user->img) {
    //             Storage::delete($user->img);
    //         }
    //         // Store the new image
    //         $user->img = $request->file('img')->store('public/user');
    //     }

    //     if ($request->password) {
    //         $user->password = Hash::make($request->password);
    //     }

    //     $user->save();

    //     return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    // }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'current_password' => 'required_with:password',
            'no_wa' => 'required|numeric',
            'img' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->filled('password')) {
            // Verify the current password
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->route('profile.edit')->withErrors(['current_password' => 'Password lama tidak sesuai.']);
            }
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_wa = $request->no_wa;
        $user->about = $request->about;

        if ($request->hasFile('img')) {
            // Delete the old image if exists
            if ($user->img) {
                Storage::delete($user->img);
            }
            // Store the new image
            $user->img = $request->file('img')->store('public/user');
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
