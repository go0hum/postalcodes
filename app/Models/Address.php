<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    public function entity()
    {
        return $this->belongsTo(Entity::class, 'key', 'entities_key');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'key', 'municipalities_key');
    }
}
