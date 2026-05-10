<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangayResident extends Model
{
    protected $table = 'barangay_residents';

    protected $fillable = [
        'resident_id',
        'first_name',
        'middle_name',  // was middle_initial — change this
        'last_name',
        'birthdate',   // add this
        'age',
        'civil_status',
        'address',
    ];
}
