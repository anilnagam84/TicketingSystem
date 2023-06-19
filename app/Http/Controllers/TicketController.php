<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        // Create a new Ticket instance and set its properties
        $ticket = new Ticket();
        $ticket->title = $validatedData['title'];
        $ticket->description = $validatedData['description'];

        // Associate the ticket with the current logged-in user
        $ticket->user_id = Auth::id();

        // Save the ticket to the database
        $ticket->save();

        // Retrieve all tickets belonging to the current user
        $userTickets = Ticket::where('user_id', Auth::id())->get();

        // Redirect the user to a view that displays the table of their tickets
        return view('/dashboard', ['tickets' => $userTickets])->with('success', 'Ticket created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
        $ticket->update([
            'status' => $request->status
        ]);

        // You can also add a success message or redirect the user to a specific page
        return back()->with('success', 'Ticket status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
