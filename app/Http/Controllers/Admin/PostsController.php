<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Redirect;
use Session;
use App\Models\Tags;
use App\Http\Middleware\chackCategory;
use App\Notifications\AddPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('chachCategory')->only('create');


    }

    public function index()
    {
        // $posts = Posts::latest()->get();

        //dd($catrgories);
        if(Auth::user()->usertype=='admin')
        {
       $posts = Posts::join('catrgories', 'catrgories.id', '=', 'Posts.category_id')
            ->select([
                'Posts.*',
                'catrgories.name_an as cat_name',
            ])->paginate();
            return view('admin.posts.index', ['posts' => $posts]);
        }else{
           // dd($posts);
                    $posts = Posts::join('catrgories', 'catrgories.id', '=', 'Posts.category_id')
                    ->select([
                        'Posts.*',
                        'catrgories.name_an as cat_name',
                    ])->where('userd_id', '=', Auth::user()->id)->get();

                    return view('admin.posts.index', ['posts' => $posts]);
             }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\posts\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'category_id' => 'required|int',
            'description' => 'required|string|max:255|min:3',
            'content' => 'required|string|max:2000|min:3',
            'image' => 'image',

        ]);

        $image_path = null;
        if ($request->hasfile('image') && $request->file('image')->isvalid()) {
            $image = $request->file('image');
            $image_path = $image->store('posts', 'images');
        }

        $data = $request->all();
        $data['image'] = $image_path;
        $data['userd_id']= Auth::user()->id;
       $posts = Posts::create($data);

    //   ** Use Notification If Add Post ***
    if($posts){

       $user =Auth::user();
       Notification::send($user,new AddPost($posts));
    }
    // ***********

              if($request->tags){ // if admin input tags array  -name input form

                $posts->tags()->attach($request->tags);
              }

     Session::flash('statuscode','success');
        return Redirect('posts')->with('status',"post ({$posts->title}) Cerated!");
        // return Redirect::route('posts.index')
        //     ->with('alert.success', "post ({$posts->title}) Cerated!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts)
    {
        //dd($posts);
       // return view ('admin.posts.show')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $posts)
    {
       // $posts = Posts::findOrfail($id);

        return View::make('admin.posts.edit',
            [
                'posts' => $posts,
                'tags'=>Tags::all()
            ]);
    }

    public function postsedit($id)
    {
        $posts = Posts::findOrfail($id);
        // dd( $posts);
        return View::make('admin.posts.edit',
            [
                'posts' => $posts,
                'tags'=>Tags::all()
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = Posts::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'category_id' => 'required|int',
            'description' => 'required|string|max:255|min:3',
            'content' => 'required|string|max:2000|min:3',
            'image' => 'image',

        ]);
        $data = $request->except('image');

        if ($request->hasfile('image') && $request->file('image')->isvalid()) {
            $image = $request->file('image');

            if ($posts->image && Storage::disk('images')->exists($posts->image)) { //if image Exist or old image in product اذا كام المنتج الو صوره وبدك تعدل عليها

                $image_path = $image->storeAs('posts', basename($posts->image), 'images'); // Updated new image same name pre-image(disk in public from file system)
            } else {
                //if not found old image -- save  New image and ne Name To Images Disk
                $image_path = $image->store('posts', 'images'); //storge disk
            }
            $data['image'] = $image_path;
        }
        if($request->tags){ // if admin input tags array  -name input form

            $posts->tags()->sync($request->tags);
          }
        $posts->update($data);
        Session::flash('statuscode','info');
         return Redirect('posts')->with('status',"The Name ({$posts->title}) Updated!");  // ok
        // return Redirect::route('posts.index')
        //     ->with('alert.success', "product ({$posts->title}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $posts = Posts::withTrashed()->where('id', $id)->first();
        //dd($posts);
        if ($posts->trashed()) {

            Storage::disk('images')->delete($posts->image); // in laravel to delete image from images disk

            $posts->forceDelete();
            Session::flash('statuscode','error');
            return Redirect('trashed-posts')->with('status',"The Name \"{$posts->title}\" trashed| Deleted!");
            // return redirect()

        } else {
            $posts->delete();
            Session::flash('statuscode','error');
            return Redirect('posts')->with('status',"The Name \"{$posts->title}\" trashed| Deleted!");
        }

        //     ->route('posts.index')
        //     ->with('alert.success', "The Name \"{$posts->title}\" Deleted!");
    }

    public function trashed()
    {
        if(Auth::user()->usertype=='admin')
        {
        $trashed = Posts::onlyTrashed()->get();
        return view('admin.posts.indextrashed', ['posts' => $trashed]);
        }else{
                $trashed = Posts::onlyTrashed()->where('userd_id', '=', Auth::user()->id)->get();

                return view('admin.posts.indextrashed', ['posts' => $trashed]);
            }
    }


    public function  restore ($id)
    {

       Posts::withTrashed()->where('id', $id)->restore();
       Session::flash('statuscode','success');
       return Redirect('posts')->with('status',"The POst  Restore!");
        //    return redirect()
        //         ->route('posts.index')
        //         ->with('alert.success', "Success Restore!");

    }

}
