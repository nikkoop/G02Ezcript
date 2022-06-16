<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $table = 'usuario';
    public $primaryKey = 'pef_id';
    public $incrementing = true;
    use HasFactory;
}
