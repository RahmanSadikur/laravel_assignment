<html>
<head>
<title>
Details of all busses
</title>

</head>
<body>
<div class="container-fluid">
<div class="table table-hover">
    <table>
<thead>
<tr>

      <th scope="col">Serial</th>
      <th scope="col">Bus Name</th>
      <th scope="col">Bus Number</th>
      <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
@for($i = 0;$i<$busses->count(); $i++)
<tr>
      <td >{{$i}}</td>
      <td >{{$busses[$i]->busName}}</td>
      <td >{{$busses[$i]->busNumber}}</td>
      <td ><a href="{{route('bus.edit',$busses[$i])}}">Edit</a>||
        <form action= "{{ route('bus.destroy',$busses[$i])}}" method="POST">

      {{method_field('DELETE')}}
   {{csrf_field()}}
    //
<input type='submit' value="Delete">
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
