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
                            <th>Bus Counter Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Incharge name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<$counters->count();$i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$counters[$i]->counterName  }}</td>
                            <td>{{$counters[$i]->address }}</td>
                            <td>{{ $counters[$i]->city }}</td>
                            <td>{{ $counters[$i]->userName }}</td>
                            <td><a href="{{route('buscounter.edit', $counters[$i]->bcid)}}"><input type="button"value="Edit"/></a>||
                                <form action="{{ route('buscounter.destroy',$counters[$i]->bcid) }}" method="POST">
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
