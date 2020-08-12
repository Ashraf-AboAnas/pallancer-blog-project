<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tags;
class Posts extends Model
{
    use SoftDeletes;
    protected $fillable=['userd_id','title','category_id','description','content','image'];

    protected $table = 'posts';

  public function tags(){
    return $this->belongsToMany(
        Tags::class,  //what i return from related class
        'post_tag', //اسم الجدول الوسيط
        'post_id', //الفورنتكي تاع الجدول الوسيط اللي بدل ع الجدول الحالي
        'tag_id',// to related
        'id',
        'id',
     );

   }

      public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());//check if posts has id by inarry method

      }

}
