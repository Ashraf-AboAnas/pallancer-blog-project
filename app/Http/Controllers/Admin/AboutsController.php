<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Abouts;
use Redirect;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Auth;
class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = Abouts::latest()->get();

       // dd($abouts);
         return view('admin.abouts.indexabouts', ['abouts' => $abouts]);

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
            'title'=>[
                  'required',
                  'string',
                  'max:255',
                  'min:3'],

          'subtitle'=>[
                    'required',
                    'string',
                    'max:255',
                    'min:3'],
         'description'=>[
                      'required',
                      'string'

                   ]
           ]);



           $abouts =Abouts::create([
            'title' => $request->post('title'),
            'subtitle'=> $request->post('subtitle'),
            'description'=>$request->post('description')
        ]);
        // $abouts=new Abouts;
        // $abouts->title=$request->input('title');
        // $abouts->subtitle=$request->input('subtitle');
        // $abouts->description=$request->input('description');
        // $abouts->save();

        return Redirect::route('abouts.index')
        ->with('alert.success',"Title Name ({$abouts->title}) Cerated!");

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
    public function aboutedit(Request $request,$id)
    {
       $abouts =Abouts::findOrfail($id);
      // dd( $abouts);
      // return view('admin.edit', ['abouts' => $abouts]);
       return View::make('admin.abouts.edit',
        [
            'abouts' =>$abouts,

        ]);
    }

    public function edit(Request $request,$id)
    {
       $abouts =Abouts::findOrfail($id);
      // dd( $abouts);
      // return view('admin.edit', ['abouts' => $abouts]);
       return View::make('admin.abouts.edit',
        [
            'abouts' =>$abouts,

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
        $request->validate([
            'title'=>[
                  'required',
                  'string',
                  'max:255',
                  'min:3'],

          'subtitle'=>[
                    'required',
                    'string',
                    'max:255',
                    'min:3'],
         'description'=>[
                      'required',
                      'string'

                    ]
           ]);

        $abouts = Abouts::findOrFail($id);

         $abouts->update([
            'title' => $request->post('title'),
            'subtitle' => $request->post('subtitle'),
            'description' => $request->post('description'),

          ]);
         // session()->flash('success','OK .ADDed') ;
         // return Redirect('role-register')->with('succsess',"The Name ({$user->name}) Updated!");  // ok

         return Redirect::route('abouts.index')
        ->with('alert.success',"The Name ({$abouts->title}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts = Abouts::findOrFail($id);
        $abouts->delete();
         return redirect()
         ->route('abouts.index')
         ->with('alert.success',"The Name \"{$abouts->title}\" Deleted!");

    }
}
