<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes , HasFactory;
    protected $guarded=[];

    public function user()  {
        return $this->belongsTo(User::class,'user_id') ;
    }

    public function client()  {
        return $this->belongsTo(Client::class,'client_id') ;
    }

    public function tasks()  {
        return $this->hasMany(Task::class,'project_id') ;
    }
}
