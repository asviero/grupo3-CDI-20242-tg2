<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUser(Request $request)
    {
        $users = DB::select('SELECT * FROM Pessoas');
        //return view('listUser', ['users' => $user]);
        return view('listUser', compact('users'));
    }
}
