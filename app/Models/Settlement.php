<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipality;
use App\Models\Locality;

class Settlement extends Model
{
    use HasFactory;

    protected $table = 'settlementes';

    protected $fillable = ['key', 'zip_code', 'name', 'zone_type', 'type', 'municipalities_id', 'localities_id'];

    public function municipality()
    {
        return $this->hasMany(Municipality::class, 'id', 'municipalities_id');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'localities_id', 'id');
    }
}
