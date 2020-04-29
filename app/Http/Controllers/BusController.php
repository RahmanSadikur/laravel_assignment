<?php

namespace App\Http\Controllers;

use App\bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus as FacadesBus;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $busses=Bus::all();
        return view('admin.showallbus',['busses'=>$busses]);
    }
    public function showall()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addbus');
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
        $busses= new Bus;
        $busses->busName=$request->busName;
        $busses->busNumber=$request->busNumber;
        if($busses->save())
        {
            return redirect()->route('bus.index');

        }
        else{

            return redirect()->route('bus.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(bus $bus)
    {
        //
        $busses=Bus::where('bid',$bus->bid)->first();
        return view('admin.showbus',["busses"=>$busses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bus $bus)
    {
        //
        $busses=Bus::where('bid',$bus->bid)->first();
        $busses->busName=$request->busName;

        $busses->busNumber=$request->busNumber;
        if($busses->save())
        {
            return redirect()->route('bus.index');
        }
        else{
            return redirect()->route('bus.edit',["busses"=>$busses]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(bus $bus)
    {
        //
        if(Bus::destroy($bus->bid))
        {
            return redirect()->route('bus.index');
        }
        else{
            return redirect()->route('bus.index');
        }
    }
}
