<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperienceDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company_name',
        'job_start_date',
        'job_end_date',
        'job_description',
        'job_current'
    ];
}
