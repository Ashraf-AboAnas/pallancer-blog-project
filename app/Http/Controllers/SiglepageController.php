<?php

namespace App\Http\Controllers;

use App\Models\Catrgories;
use App\Models\Posts;
use Illuminate\Http\Request;

class SiglepageController extends Controller
{
    public function show(posts $posts){

        return view ('admin.posts.show')->with('posts',$posts)->with('categories',Catrgories::all());

    }
}
