<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'job_source',
        'location',
        'country_id',
        'job_nature',
        'office_type',
        'salary_range',
        'application_last_date',
        'current_stage_id',
        'detail'
    ];

    protected $casts = [
        'salary_range' => 'json',
    ];

    protected $cascadeDeletes = ['contacts'];


    public function matchJobNature($job_nature)
    {
        return match ($job_nature) {
            'full_time' => 'Full Time',
            'part_time' => 'Part Time',
            'freelance' => 'Freelance',
            'internship' => 'Internship',
            'volunteer' => 'Volunteer',
            default => 'Unknown Job Nature',
        };
    }

    public function matchOfficeType($office_type)
    {
        return match ($office_type) {
            'on_site' => 'On Site',
            'remote' => 'Remote',
            'hybrid' => 'Hybrid',
            default => 'Unknown office type',
        };
    }

    public function salary($slary)
    {
        $salaryJson = json_decode($slary, true);

        $minSalary = isset($salaryJson['min']) ? $salaryJson['min'] : 0;
        $maxSalary = isset($salaryJson['max']) ? $salaryJson['max'] : 0;

        return [
            'minSalary' => $minSalary,
            'maxSalary' => $maxSalary
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'current_stage_id', 'id');
    }


}
