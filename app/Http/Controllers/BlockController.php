<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlockResource;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Check all blocks and availability
     */
    public function index()
    {
        return BlockResource::collection(Block::get());
    }
}
