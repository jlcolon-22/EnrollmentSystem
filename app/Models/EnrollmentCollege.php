<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentCollege extends Model
{
    use HasFactory;
    protected $fillable = 
    [   
        'user_id',
        'firstname',
        'middlename',
        'lastname',
        'placeOfBirth',
        'dateOfBirth',
        'cellphoneNumber',
        'permanentAddress',
        'course',
        'fatherName',
        'fatherCellphoneNumber',
        'motherName',
        'motherCellphoneNumber',
        'status',
        'psa',
        'goodMoral',
        'form137',
        'form138'
    ];
}
