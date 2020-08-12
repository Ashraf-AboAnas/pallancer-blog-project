<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $posts = Posts::join('catrgories', 'catrgories.id', '=', 'Posts.category_id')
        ->select([
            'Posts.*',
            'catrgories.name_an as cat_name',
        ])->paginate();

    return view('welcome',
    [
    'posts'=>$posts

    ]);
    }



}//end class welcomController
