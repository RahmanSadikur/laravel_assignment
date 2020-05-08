<html>
    <head>
        <title>
        </title>
    </head>
    <body>
        <div class="container-fluid">
            <form action="{{ route('schedule.store')}}" method="POST">
                <div class="row">
                    <div class="col-sm-4">
                        Date:
                    </div>
                    <div class="col-sm-8">
                        <input type="date" name="date" value="{{date('Y-m-d')}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Bus Name
                    </div>
                    <div class="col-sm-8">
                        <select name="bid">
                            @foreach($busses as $busses)
                            <option value="{{ $busses->bid }}" >{{ $busses->busName }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Starting Counter:
                    </div>
                    <div class="col-sm-8">
                        <select name="startCounter">
                            @foreach($counters as $counters)
                            <option value="{{ $counters->bcid }}" >{{ $counters->CounterName }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                       Destination Counter:
                    </div>
                    <div class="col-sm-8">
                        <select name=" destinationCounter">
                            @foreach($counters as $counters)
                            <option value="{{ $counters->bcid }}" >{{ $counters->CounterName }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Start Time:
                    </div>
                    <div class="col-sm-8">
                        <input type="time" name="startTime" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-8">
                        <input type="submit" value="Save"/>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
