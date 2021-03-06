<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StructureType;
use App\Models\StructureCategory;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Models\VisitSummary;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;

class StructureProfile extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = ['structure_type_id','structure_category_id','name','slogan', "address", "street", "town_id", "neighborhood_id", "phone" , "email", "website", "latitude", "longitude", "description"];




    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function doctors()
    {
        return $this->hasMany(DoctorProfile::class, 'structure_id');
    }


    public function structure_type(){
        return $this->belongsTo(StructureType::class);
    }
    public function structure_category(){
        return $this->belongsTo(StructureCategory::class);
    }

    public function town(){
        return $this->belongsTo(Town::class);
    }

    public function neighborhood(){
        return $this->belongsTo(Neighborhood::class);
    }

    public function visit_summary(){
        return $this->hasMany(VisitSummary::class);
    }

    public function attachment()
    {
        return $this->morphOne(EloquentStorageAttachment::class, 'attachable');
    }

}
