<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Books;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $idAdmin = $request->session()->get('id_admin');

        $user = Admin::find($idAdmin);
        $books = Books::with('genre')->get();

        return view('admins.dashboard', compact('user', 'idAdmin', 'books'));
    }
}
