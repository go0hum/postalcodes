<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipality;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name'];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
