<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['client_id','user_id','created_at','complete'];
    public $timestamps = false;
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
}
