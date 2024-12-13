<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Ticket;
use App\Models\PurchasedTicket;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewBuses()
    {
        return response()->json(Bus::all());
    }

    public function viewTickets(Request $request)
    {
        $tickets = Ticket::with('bus')->get();
        return response()->json(['tickets' => $tickets]);
    }

    public function purchaseTicket(Request $request)
    {
        $validated = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $ticket = Ticket::findOrFail($validated['ticket_id']);
        $userId = auth()->id();

        $existingPurchase = PurchasedTicket::where('user_id', $userId)->where('ticket_id', $ticket->id)->exists();

        if ($existingPurchase) {
            return response()->json(['message' => 'Ticket already purchased'], 400);
        }

        PurchasedTicket::create([
            'user_id' => $userId,
            'ticket_id' => $ticket->id,
        ]);

        return response()->json(['message' => 'Ticket purchased successfully']);
    }

}
