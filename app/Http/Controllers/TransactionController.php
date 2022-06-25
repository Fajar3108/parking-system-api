<?php

namespace App\Http\Controllers;

use App\Models\{Transaction, Slot};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function start_parking(Request $request)
    {
        $validate = Validator::make($request->only('slot_id', 'vehicle_number'), [
            'slot_id' => ['required'],
            'vehicle_number' => ['required']
        ]);

        if ($validate->fails()) return response()->json([
            'success' => false,
            'errors' => $validate->errors(),
        ]);

        $slot = Slot::find($request->slot_id);

        if (!$slot) return response()->json([
            'success' => false,
            'message' => 'Invalid Slot ID',
        ]);

        if ($slot->transactions()->where('end', NULL)->first()) return response()->json([
            'success' => false,
            'message' => 'The slot is not vacant.',
        ]);

        Transaction::create([
            'slot_id' => $slot->id,
            'vehicle_number' => $request->vehicle_number,
            'start' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'managed to park in this slot',
        ]);
    }

    public function stop_parking(Request $request)
    {
        $slot = Slot::find($request->slot_id);

        if (!$slot) return response()->json([
            'success' => false,
            'message' => 'Invalid Slot ID',
        ]);

        $transaction = Transaction::where('slot_id', $slot->id)->where('end', NULL)->first();

        if (!$transaction) return response()->json([
            'success' => false,
            'message' => 'no one is parking here',
        ]);

        $transaction->update([
            'end' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data has been updated',
        ]);
    }
}
