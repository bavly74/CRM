<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes , HasFactory;

    protected $guarded =[] ;

    public function project() {
        return $this->belongsTo(Project::class,'project_id') ;
    }
}
