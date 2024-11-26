<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    private function generateIDUser()
    {
        $lastUser = User::latest()->first();
        if ($lastUser) {
            $idUser = $lastUser->id_user;
            $idUser = substr($idUser, 4);
            $idUser = (int)$idUser + 1;
            $idUser = str_pad($idUser, 3, '0', STR_PAD_LEFT);
            return 'USR-' . $idUser;
        } else {
            return 'USR-001';
        }
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users,email,NULL,id_user',
            'password' => 'required|string|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/auth/register')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'id_user' => $this->generateIDUser(),
            'full_name' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('users.dashboard')->with('success', 'Registrasi Berhasil');
    }
}
