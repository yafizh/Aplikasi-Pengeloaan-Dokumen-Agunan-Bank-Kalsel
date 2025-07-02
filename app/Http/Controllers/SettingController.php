<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function editPassword()
    {
        return view('pages.setting.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
        ]);

        Auth::user()->update(['password' => $validatedData['password']]);

        return back()->with('message', 'Change Password Successfully');
    }
}
