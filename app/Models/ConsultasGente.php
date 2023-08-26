<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultasGente extends Model
{
    use HasFactory;
    protected  $fillable = ['fullname', 'number', 'email'];
}
