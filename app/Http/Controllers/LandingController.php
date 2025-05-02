<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Users;
use Illuminate\Http\Request;


class LandingController extends Controller
{
    public function index()
    {
        $users = Users::all();  // Menampilkan semua pengguna
        return view('Landing.index', compact('users'));
    }
}