<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blocks = Block::get();

        $blocks->each(function ($block) {
            $block->slots()->create(['number' => 1]);
            $block->slots()->create(['number' => 2]);
            $block->slots()->create(['number' => 3]);
            $block->slots()->create(['number' => 4]);
            $block->slots()->create(['number' => 5]);
        });
    }
}
