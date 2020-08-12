<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catrgories;
use App\Models\Tags;
use Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tags::all();

     //dd($catrgories);

       return view('admin.tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'=>[
              'required',
              'string',
              'max:255',
              'min:3']

       ]);


        $tags =Tags::create([
            'name' => $request->post('name'),

            //'status'=>$request->post('status')
        ]);


        return Redirect::route('tags.index')
        ->with('alert.success',"Tag Name -- ({$tags->name}) -- Cerated!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>[
                  'required',
                  'string',
                  'max:255',
                  'min:3']

           ]);
           $tags = Tags::findOrFail( $request->tags_id);
          // dd($categories);

           $tags->update($request->all());
           return Redirect::route('tags.index')
           ->with('alert.success',"Tag Name -- ({$tags->name}) -- updated!");
          // return Redirect::back()->with('stutas','Operation Successful !');
        //   return Redirect::route('categories.index')
        // ->with('alert.success',"The Names ({$categories->name_ar}) -- ({$categories->name_an}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tags::findOrFail($id);
        $tags->delete();
         return redirect()
         ->route('tags.index')
         ->with('alert.success',"The tag Name \"{$tags->name}\" Deleted!");
    }
}
