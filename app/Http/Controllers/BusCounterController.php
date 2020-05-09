<?php

namespace App\Http\Controllers;

use App\busCounter;
use App\user;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BusCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();





        $counters=DB::table('busCounters')
        ->join('users','users.uid','=','busCounters.uid')
        ->select('busCounters.*','users.userName')
        ->get();
        printf($counters[1]->userName);
        return view('admin.showallbuscounter',["counters"=>$counters]);
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
      $users=User::all();
        return view('admin.addbuscounter',['users'=>$users]);
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
        $validatedData = $request->validate([

            'counterName' => 'required',
            'address' => 'required',
            'city' => 'required',

        ]);

        $counters=new BusCounter;
        $counters->counterName=$request->counterName;
        $counters->address=$request->address;
        $counters->city=$request->city;

        $counters->uid=$request->uid;
        if($counters->save())
        {
            return redirect()->route('buscounter.index');

        }
        else{
            return redirect()->route('buscounter.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function show(busCounter $busCounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $counters=BusCounter::where('bcid', $id)->first();
        $users=User::all();
        return View('admin.showbuscounter',['counters'=>$counters,'users'=>$users]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, busCounter $busCounter)
    {
        //
        $validatedData = $request->validate([

            'counterName' => 'required',
            'address' => 'required',
            'city' => 'required',

        ]);
        // if($validatedData->fails())
        // {
        //     return back()
		// 			->with('errors', $validatedData->errors())
		// 			->withInput();
        // }
        $counters=BusCounter::where('bcid', $request->bcid)->first();
        $counters->counterName=$request->counterName;
        $counters->address=$request->address;
        $counters->city=$request->city;
        $counters->uid=$request->uid;
        if($counters->save())
        {
            return redirect()->route('buscounter.index');
        }
        else{
            return redirect()->route('buscounter.edit',$busCounter->bcid);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\busCounter  $busCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $counters=BusCounter::where('bcid', $id)->delete();
        return redirect()->route('buscounter.index');

    }
}
