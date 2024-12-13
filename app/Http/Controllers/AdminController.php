<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addBus(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'route' => 'required|string',
            'capacity' => 'required|integer',
        ]);

        $bus = Bus::create($validated);

        return response()->json(['bus' => $bus], 201);
    }

    public function addTicket(Request $request)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'price' => 'required|numeric',
            'time_slot' => 'required|string',
        ]);

        $ticket = Ticket::create($validated);

        return response()->json(['ticket' => $ticket], 201);
    }

    public function updateBus(Request $request, Bus $bus)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'route' => 'sometimes|string',
            'capacity' => 'sometimes|integer',
        ]);

        $bus->update($validated);
        return response()->json(['bus' => $bus]);
    }

    public function deleteBus(Bus $bus)
    {
        $bus->delete();
        return response()->json(['message' => 'Bus deleted']);
    }

    public function updateTicket(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'price' => 'sometimes|numeric',
            'time_slot' => 'sometimes|string',
        ]);

        $ticket->update($validated);
        return response()->json(['ticket' => $ticket]);
    }

    public function deleteTicket(Ticket $ticket)
    {
        $ticket->delete();
        return response()->json(['message' => 'Ticket deleted']);
    }

}

