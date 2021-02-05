<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\User;

class DoctorProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'uid',
        'civility',
        'first_name',
        'last_name',
        'email',
        'speciality_id',
        'structure_id',
        'town_id',
        'neighborhood_id',
        'address',
        'phone',
        'service_id',
        'description',
        'status'
       
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function structure(){
        return $this->belongsTo(StructureProfile::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    public function town(){
        return $this->belongsTo(Town::class);
    }
    public function neighborhood(){
        return $this->belongsTo(Neighborhood::class);
    }

    public function doctor_order(){
        return $this->hasOne(DoctorOrder::class,'doctor_id');
    }

    public function getFullnameAttribute() {
    	return $this->first_name . ' ' . $this->last_name;
	}

    public function getFullNameWithReferenceAttribute() {
        return $this->first_name . ' ' . $this->last_name . ' | '. $this->doctor_order->reference;
    }
}