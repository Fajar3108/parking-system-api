<?php

namespace Database\Seeders;

use App\Models\{Slot, Transaction};
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            $date = Carbon::create(2021, rand(1, 12), rand(1, 20), rand(1, 23), rand(1, 59), rand(1, 59));
            Transaction::create([
                'slot_id' => Slot::get()->random()->id,
                'vehicle_number' => Str::upper(Str::random(1)) . " " . rand(1000, 9999) . " " . Str::upper(Str::random(3)),
                'start' => $date->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
