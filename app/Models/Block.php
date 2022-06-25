<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Slot::class);
    }
}
