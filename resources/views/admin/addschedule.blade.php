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
                        <div>
                            @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
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
                            <option value="{{ $counters->bcid }}" >{{ $counters->counterName }}</option>
                            @endforeach

                        </select>
                        <div>
                            @error('startCounter')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                       Destination Counter:
                    </div>
                    <div class="col-sm-8">
                        <select name=" destinationCounter">
                            @foreach($counters2 as $counters2)
                            <option value="{{ $counters2->bcid }}">{{ $counters2->counterName }}</option>
                            @endforeach

                        </select>
                        <div>
                            @error('destinationCounter')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Start Time:
                    </div>
                    <div class="col-sm-8">
                        <input type="time" name="startTime" />
                        <div>
                            @error('startTime')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-8">
                        <input type="submit" value="Save"/>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </body>
</html>
