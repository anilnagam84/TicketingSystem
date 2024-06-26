<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $usertype = $user->usertype;

        if ($usertype == 'user') {
            $userTickets = Ticket::where('user_id', $user->id)->get();
            return view('dashboard', ['tickets' => $userTickets]);
        } elseif ($usertype == 'admin'){
             $userTickets = Ticket::all();
            return view('admin.adminhome',['tickets' => $userTickets]);
        } elseif ($usertype == 'developer'){
            $userTickets = Ticket::where('user_id',$user->id)->get();
            $escalatedTickets = Ticket::where('status', 'escalated')->get();
            // Pass the escalated tickets to the view
            return view('developer.developerhome', ['escalatedTickets' => $escalatedTickets]);
            // return view('developer.developerhome',['tickets' => $userTickets]);
        } else {
            return redirect()->back();
        }
    }
}

