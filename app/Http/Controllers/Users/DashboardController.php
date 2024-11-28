<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->session()->get('user_id');

        // Jika Anda ingin mengambil data lain, Anda bisa melakukannya di sini
        $user = User::find($userId); // Ambil data user dari database jika perlu

        return view('users.dashboard', compact('user', 'userId'));
    }
}
