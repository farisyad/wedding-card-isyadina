<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'attending' => 'required|boolean',
            'pax' => 'nullable|integer|min:1',
            'message' => 'nullable|string|max:500',
        ]);

        $rsvp = Rsvp::create([
            'name' => $request->name,
            'attending' => $request->attending,
            'pax' => $request->pax ?? 1,
            'message' => $request->message,
        ]);

        return response()->json([
            'message' => 'Terima kasih atas ucapan dan kehadiran anda 🤍',
            'rsvp' => $rsvp
        ]);
    }

}
