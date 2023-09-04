<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'qualification',
        'field_of_study',
        'study_start_date',
        'study_end_date'
    ];
}
