<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $table = 'rol';
    protected $primaryKey = 'rol_id';
    public $incrementing = true;
    use HasFactory;
}
