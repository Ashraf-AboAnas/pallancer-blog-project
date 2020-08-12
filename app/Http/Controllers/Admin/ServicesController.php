<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Abouts;
use Illuminate\Support\Facades\View;
use Redirect;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::latest()->get();
           
       // dd($abouts);
         return view('admin.services.indexservices', ['services' => $services]);
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
        $services =Services::create([
            'service_name' => $request->post('service_name'),        
            'service_description'=> $request->post('service_description')
            //'status'=>$request->post('status')
        ]);
        

        return Redirect::route('services.index')
        ->with('alert.success',"Title Name ({$services->service_name}) Cerated!");
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
       // dd($request->all());
        $services = Services::findOrFail( $request->service_id);
        $services->update($request->all());
       // return back();
       return Redirect::route('services.index')
       ->with('alert.success',"The Names ({$services->service_name}) -- ({$services->service_description}) Updated!");
   }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Services::findOrFail($id);
        $services->delete();
         return redirect()
         ->route('services.index')
         ->with('alert.success',"The Name \"{$services->service_name}\" Deleted!");
    }
}
