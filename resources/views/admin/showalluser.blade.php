<html>
<head>
<title>Employee List 
</title>
</head>
<body>
<table>
<tr>
<th>Serial</th>
<th>User Name</th>
<th>Email</th>
<th>Address</th>
<th>Phone</th>
<th>Date of Birth</th>
<th>Action</th>
</td>
@for ($i = 0; $i < $users->count(); $i++)
        <tr>
            <td>{{$i}}</td>
            
            <td>{{ $users[$i]->userName }}</td>
            <td>{{ $users[$i]->email}}</td>
            <td>{{ $users[$i]->address }}</td>
            <td>{{ $users[$i]->phone}}</td>
            
            <td>{{ $users[$i]->dob }}</td>
            
            <td><a href="{{route('user.edit', $users[$i])}}">Edit</a>||
            <form method="post" action="{{action('UserController@delete',$users[$i])}}">
            {{csrf_field()}}
            <input type="submit" value="Delete">
            </form>
            </td>

        </tr>
@endfor




</table>

</body>
</html>
