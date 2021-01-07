<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Locality;
use App\Models\Speciality;
use App\Models\Structure;
use App\Models\EloquentStorageAttachment;


class SubscriptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    	'civility',
    	'first_name',
    	'last_name',
    	'address',
    	'phone',
    	'street',
    	'door',
    	'email',
    	'locality_id',
    	'speciality_id',
    	'speciality_id',
    	'description',
        'status'
    ];

    public function locality(){
        return $this->belongsTo(Locality::class);
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    public function structure(){
        return $this->belongsTo(Structure::class);
    }

    public function eloquent_storage_attachment()
    {
        return $this->morphMany(EloquentStorageAttachment::class, 'attachable');
    }
}