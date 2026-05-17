<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'resident_name',
        'resident_id',
        'service_type_id',
        'purpose',
        'notes',
        'id_image_path', // <--- MUST BE EXACTLY THIS
        'status',
        'rejection_reason',
    ];
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
