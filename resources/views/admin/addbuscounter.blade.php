<html>
    <head>
        <title>Add Bus Counter</title>
    </head>
    <body>
        <form action="{{ route('buscounter.store') }}" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    Bus Counter Name:
                </div>
                <div class="col-sm-8">
                    <input type="text" name="counterName"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    Bus Counter <Address></Address>:
                </div>
                <div class="col-sm-8">
                    <input type="text" name="address"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    City:
                </div>
                <div class="col-sm-8">
                    <input type="text" name="city"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    Manager Name:
                </div>
                <div class="col-sm-8">
                    <select name="uid">
                        @foreach($users as $users)
                            <option value="{{ $users->uid }}">{{ $users->userName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-8">
                    <input type="submit" value="Save"/>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
        </form>
    </body>
</html>
