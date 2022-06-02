<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    
    public $table = "curso";
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;
}
