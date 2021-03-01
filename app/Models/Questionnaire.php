<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    // every single model by default has mass assignement protection in model turned on 
    // but we do not want that so we write following
    protected $guarded = [];
}
