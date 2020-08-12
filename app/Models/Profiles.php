<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\user;
use Illuminate\Notifications\Notifiable;

class Profiles extends Model
{
    use Notifiable;

   protected $fillable =  ['user_id','facebook','twitter','city','country','about','image'];

   public function user()
     {
         return $this->belongsTo('User'::class);
     }

}
