<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangayResident extends Model {
    protected $table = 'barangay_residents';

    protected $fillable = [
    'first_name',
    'middle_initial',
    'last_name',
    'age',
    'civil_status',
    'home_address',
];
}