<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class ChangePasswordController extends Controller
{
    public function edit() {
        return view('auth.passwords.change');
    }

    public function update(Request $request)
    {
  
        #Match The Old Password
        $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        #Update the new Password
      
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with("success", "Password changed successfully!");
    }
}
