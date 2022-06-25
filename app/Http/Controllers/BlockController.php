<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlockResource;
use App\Models\Block;

class BlockController extends Controller
{
    /**
     * Check all blocks and availability
     */
    public function index()
    {
        return BlockResource::collection(Block::get());
    }

    /**
     * Get Block detail information
     */
    public function show($id)
    {
        $block = Block::find($id);

        $slots = collect();

        $block->slots()->select('id', 'number')->each(function ($slot) use ($slots, $block) {
            $slots->push(collect($slot)->put('is_avaible', $block->transactions()->where('slot_id', $slot->id)->where('end', null)->first() ? false : true));
        });

        return [
            'id' => $block->id,
            'code' => $block->code,
            'total_slots' => $block->slots()->count(),
            'avaible_slot' => $block->slots()->count() - $block->transactions()->where('end', NULL)->count(),
            'slots' => $slots,
        ];
    }
}
