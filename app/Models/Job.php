<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['name','description'];
    use HasFactory;

    public function user(){
        return $this->hasMany(User::class,'job_id');
    }
}
