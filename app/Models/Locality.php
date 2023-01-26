<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipality;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name', 'municipalities_id'];

}
