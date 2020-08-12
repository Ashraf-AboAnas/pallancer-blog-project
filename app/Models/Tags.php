<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;
class Tags extends Model
{
    public $timestamps =false;
    protected $fillable=['name'];

    public function posts(){
        return $this->belongsToMany(
            Posts::class,  //what i return from related class
            'post_tag', //اسم الجدول الوسيط
            'tag_id', //الفورفتكي تاع الجدول الوسيط اللي بدل ع الجدول الحالي
            'post_id',// to related
            'id',
            'id',
        );

          }
}
