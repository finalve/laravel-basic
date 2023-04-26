<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ChangePasswordController extends Controller
{
    public function edit() {
        return view('auth.passwords.change');
    }

    public function update() {
        
    }
}
