<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catrgories;
use Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class CatrgoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Catrgories::latest()->get();

     //dd($catrgories);

       return view('admin.categories.index', ['categories' => $categories]);
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
        'name_ar'=>[
              'required',
              'string',
              'max:255',
              'min:3'],

        'name_an'=>[
              'required',
              'string',
              'max:255',
              'min:3'
              ]

       ]);


        $categories =Catrgories::create([
            'name_ar' => $request->post('name_ar'),
            'name_an'=> $request->post('name_an')
            //'status'=>$request->post('status')
        ]);


        return Redirect::route('categories.index')
        ->with('alert.success',"Title Name ({$categories->name_ar}) -- ({$categories->name_an}) Cerated!");

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
            'name_ar'=>[
                  'required',
                  'string',
                  'max:255',
                  'min:3'],

            'name_an'=>[
                  'required',
                  'string',
                  'max:255',
                  'min:3'
                  ]

           ]);
           $categories = Catrgories::findOrFail( $request->categories_id);
          // dd($categories);
           $categories->update($request->all());
          // return Redirect::back()->with('stutas','Operation Successful !');
          return Redirect::route('categories.index')
          ->with('alert.success',"The Names ({$categories->name_ar}) -- ({$categories->name_an}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Catrgories::findOrFail($id);
        $categories->delete();
         return redirect()
         ->route('categories.index')
         ->with('alert.success',"The Name \"{$categories->name_an}\" Deleted!");
    }
}
