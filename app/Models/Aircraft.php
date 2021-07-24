<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'type_id',
        'size_id',
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }
}
