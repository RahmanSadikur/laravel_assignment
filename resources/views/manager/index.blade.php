<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>

	<h1>Welcome Home! {{session('xyz')}}</h1>&nbsp


	<a href="{{route('bus.create')}}">Add New Busses</a> ||
	<a href="{{route('bus.index')}}">Show busses</a> ||
	<a href="{{route('schedule.create')}}">Create Schedule</a> ||
	<a href="{{route('schedule.index')}}">Show schedule</a> ||

	<a href="{{route('buscounter.index')}}">Show Bus-Counter</a> ||
	<a href="/logout">Logout</a>

</body>
</html>
