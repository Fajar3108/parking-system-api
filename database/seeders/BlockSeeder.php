<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(['A', 'B', 'C', 'D', 'E', 'F'])->each(function ($item) {
            Block::create(['code' => $item]);
        });
    }
}
