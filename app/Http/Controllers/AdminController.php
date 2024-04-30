<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function adminHome()
{
    $resolvedTickets = Ticket::where('status', 'resolved')->get(); // Fetch resolved tickets from the database

    return view('admin.adminhome', compact('resolvedTickets'));
}
    public function addUser(Request $request)
    {
        // Handle the logic to add a user
    }

}
