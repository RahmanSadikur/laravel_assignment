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
                    <input type="text" name="counterName" value="{{ old('counterName') }}"/>
                    <div>
                        @error('counterName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    Bus Counter <Address></Address>:
                </div>
                <div class="col-sm-8">
                    <input type="text" name="address"value=" {{ old('address') }}"/>
                    <div>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    City:
                </div>
                <div class="col-sm-8">
                    <input type="text" name="city" value="{{ old('city') }}"/>
                    <div>
                        @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
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
