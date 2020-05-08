<html>
    <head>
        <title>
        </title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Date</th>
                            <th>Bus Name</th>
                            <th>Starting Counter</th>
                            <th>Destination Counter</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<$schedules->count();$i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$schedules[$i]->date  }}</td>
                            <td>{{$schedules[$i]->busName }}</td>
                            <td>{{ $schedules[$i]->startingCounter }}</td>
                            <td>{{ $schedules[$i]->desCounter }}</td>
                            <td>{{ $schedules[$i]->startTime }}</td>
                            <td><a href="{{route('schedule.edit', $schedules[$i]->sid)}}"><input type="button"value="Edit"/></a>||
                                <form action="{{ route('schedule.destroy',$schedules[$i]->sid) }}" method="POST">
                                    <input type="submit"value="delete"/>
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                </form>

                            </td>

                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
