<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'username', 'password')
            ->orderBy('id', 'asc')
            ->get();

        $totalUsers = User::count();

        return view('user.index', compact('users', 'totalUsers'));
    }
}
