<?php

namespace App\Http\Controllers;

use App\Models\Data;
use DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data_preview');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   

        foreach ($request->modulesSelected as $module) {
            if($module=='daily_data'){
                $weather = DB::table($module)->where('fecha','>=',$request->startDate)->where('fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);
         
            } if($module=='pachagrama') {

                $pachagrama = DB::table($module)->where('fecha_siembra','>=',$request->startDate)->where('fecha_siembra','<=',$request->endDate)->whereIn('comunidad_id', $request->comunidadsSelected)->paginate(5);
             
            }
                
         }

        return response()->json([
            'weather' => json_decode($weather->toJson()), 
            'pachagrama' => json_decode($pachagrama->toJson())
        ]);
       


     
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download(Request $request)
    {

    }

}
