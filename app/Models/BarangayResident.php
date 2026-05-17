<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayResident extends Model
{
    use HasFactory;


    protected $fillable = [
        'resident_id',
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'gender',
        'age',
        'civil_status',
        'address',
    ];
}
