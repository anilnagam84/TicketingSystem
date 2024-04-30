<?php

namespace App\Http\Controllers;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        $clientCount = User::where('usertype', 'user')->count();
        $users = User::where('usertype', 'user')->get();

        return view('clients', [
            'users' => $users,
            'clientCount' => $clientCount
        ]);
    }
}
