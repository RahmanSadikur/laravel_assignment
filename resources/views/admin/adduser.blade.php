<html>
<head>
<title>Add Employee
</title>
</head>
<body>
<form method="post" action="{{action('UserController@store')}}" >

		{{csrf_field()}}
<table>
<tr>
<td>
User Name:
</td>
<td>
<input type='text' name='userName' value="{{old('userName')}}"/>
</td>
</tr>

<tr>
<td>
Email:
</td>
<td>
<input type='text' name='email' value="{{old('email')}}"/>
</td>
</tr>

<tr>
<td>
Password:
</td>
<td>
<input type='text' name='password' value="{{old('password')}}"/>
</td>
</tr>

<tr>
<td>
Address:
</td>
<td>
<input type='text' name='address' value="{{old('address')}}"/>
</td>
</tr>

<tr>
<td>
Phone:
</td>
<td>
<input type='text' name='phone' value="{{old('phone')}}"/>
</td>
</tr>

<tr>
<td>
Date Of Birth:
</td>
<td>
<input type='text' name='dob' value="{{old('dob')}}"/>
</td>
</tr>
<tr>
<td>
Designation:
</td>
<td>
<select name="userTypeId" >
     <option></option>
        @foreach($userTypes as $userTypes) 
        <option value="{{ $userTypes->userTypeName}}"> {{ $userTypes->userTypeName }} </option> 
        @endforeach
    </select>
</td>
</tr>

<tr>
<td>
Date Of Birth:
</td>
<td>
<input type='submit' name='save' value="Save"/>
</td>
</tr>




</table>
</form>
</body>
</html>