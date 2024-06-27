<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{

    protected $fillable = ['user_id', 'date', 'exercise', 'value', 'perception'];
    use HasFactory;
}
