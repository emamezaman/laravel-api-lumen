<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected  $fillable = ['user_id','title','body','price','image'];
    protected  $guarded = [];

    public function episodes(){
        return $this->hasMany(Episode::class,'course_id','id');
    }
}
