<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>	

	<h1>Welcome Home! {{session('xyz')}}</h1>&nbsp

	<a href="{{route('user.create')}}">Create User</a> |
	<a href="{{route('user.index')}}">Show User</a> 
	<a href="{{route('bus.create')}}">View Users</a> |
	<a href="{{route('bus.showall')}}">Show busses</a> 
	<a href="{{route('schedule.create')}}">Create Schedule</a> |
	<a href="{{route('schedule.showall')}}">Show schedule</a> |
	<a href="{{route('buscounter.create')}}">Create Bus-Counter</a> |
	<a href="{{route('buscounter.showall')}}">Show Bus-Counter</a> |
	<a href="/logout">Logout</a> 

</body>
</html>