<html>
<head>
<title>
    Add Bus
</title>
</head>
<body>
    <form method="post" action="{{ route('bus.store')}}" >

 {{csrf_field()}}
<div  class="container">

    <div class="row">
    <div class="col-sm-4">
        Bus Name:
    </div>
    <div class="col-sm-8">
        <input type="text" name="busName"/>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            Bus Number:
        </div>
        <div class="col-sm-8">
            <input type="text" name="busNumber"/>
        </div>
        </div>


<input type='submit' value="Save">
</div>
    </form>
</body>

</html>
