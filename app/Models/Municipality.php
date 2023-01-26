<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entity;
use App\Models\Locality;
use App\Models\Settlement;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name', 'entities_key'];

    public function settlement()
    {
        return $this->belongsTo(Settlement::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entities_key', 'key');
    }
}
