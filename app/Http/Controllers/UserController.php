<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // fungsi untuk menampilkan data user
    public function index(){
        $users = User::all();
        echo 'data user dari controller';
        return view('users.index', compact('users'));
    }
}
