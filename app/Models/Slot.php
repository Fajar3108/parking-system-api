<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'block_id'];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
