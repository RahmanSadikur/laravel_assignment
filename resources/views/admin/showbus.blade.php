<html>
    <head>
        <title>Edit Bus details
        </title>
    </head>
    <body>
        <form action="{{route('bus.update',$busses)}}" method="POST">

            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        Bus Id:
                    </div>
                    <div class="col-sm-8">
                        <input type="text" value="{{ $busses->bid }}" name="bid" readonly/>
                    </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            Bus Name:
                        </div>
                        <div class="col-sm-8">
                            <input type="text" value="{{ $busses->busName }}" name="busName"/>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Bus Number:
                        </div>
                        <div class="col-sm-8">
                            <input type="text"  value="{{ $busses->busNumber }}" name="busNumber"/>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-8">
                            <input type="Submit" value="SAVE"/>
                        </div>

                    </div>
            </div>
            {{method_field('put')}}
            {{ csrf_field() }}
        </form>
    </body>
</html>
