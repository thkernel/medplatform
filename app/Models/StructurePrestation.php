<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructurePrestation extends Model
{
    use HasFactory;
    protected $fillable = ['prestation_id', 'structure_id' , 'status', 'user_id'];

}
