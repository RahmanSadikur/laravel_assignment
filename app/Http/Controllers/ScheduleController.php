<?php

namespace App\Http\Controllers;

use App\schedule;
use App\busCounter;
use App\bus;
use Illuminate\Console\Scheduling\Schedule as SchedulingSchedule;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedules=DB::table('schedules')
        ->join('busCounters as startbusCounter','startbusCounter.bcid','=','schedules.startCounter')
        ->join('busCounters as desbusCounter','desbusCounter.bcid','=','schedules.destinationCounter')
        ->join('busses','busses.bid','=','schedules.bid')
        ->select('schedules.*','busses.busName','startbusCounter.counterName as startingCounter','desbusCounter.counterName as desCounter')
        ->get();
        printf($schedules);

        return view('admin.showallschedule',['schedules'=>$schedules]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $counters=BusCounter::all();
        $counters2=BusCounter::all();

        $busses=Bus::all();
        return view('admin.addschedule',['busses'=>$busses,'counters'=>$counters,'counters2'=>$counters2]);
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
        $schedules= new Schedule;
        $schedules->date=$request->date;
        $schedules->bid=$request->bid;
        $schedules->startCounter=$request->startCounter;
        $schedules->destinationCounter=$request->destinationCounter;
        $schedules->startTime=$request->startTime;
        if($schedules->save())
        {
            return redirect()->route('schedule.index');
        }
        else{
            return redirect()->route('schedule.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $schedules=Schedule::where('sid', $id)->first();
        $counters=BusCounter::all();
        $counters2=BusCounter::all();
        $busses=Bus::all();
        return view('admin.showschedule',['schedules'=>$schedules,'busses'=>$busses,'counters'=>$counters,'counters2'=>$counters2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schedule $schedule)
    {
        //
        $schedules= Schedule::where('sid', $request->sid)->first();;
        $schedules->date=$request->date;
        $schedules->bid=$request->bid;
        $schedules->startCounter=$request->startCounter;
        $schedules->destinationCounter=$request->destinationCounter;
        $schedules->startTime=$request->startTime;
        if($schedules->save())
        {
            return redirect()->route('schedule.index');
        }
        else{
            return redirect()->route('schedule.edit',$request->sid);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $schedules=Schedule::where('sid',$id)->delete();
        return redirect()->route('schedule.index');

    }
}
