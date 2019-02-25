<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Excel;
use File;
use App\Performance;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $listperform = Performance::all();
        return view('performance.index',compact('listperform'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    public function import (Request $request) {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $performance = new Performance();
                    $performance->id_atm = $value->id_atm;
                    $performance->lokasi = $value->lokasi;
                    $performance->area = $value->area;
                    $performance->pengelola = $value->pengelola;
                    $performance->jenis_lokasi = $value->jenis_lokasi;
                    $performance->jenis_mesin = $value->jenis_mesin;
                    $performance->denom = $value->denom;
                    $performance->item = $value->item;
                    $performance->volume = $value->volume;
                    $performance->feebased = $value->feebased;
                    $performance->kuadran = $value->kuadran;
                    $performance->save();

                }
            }
            return back();
        }
    }
}
