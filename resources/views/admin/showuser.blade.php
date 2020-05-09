<html>
<head>
<title>Add Employee
</title>
</head>
<body>
<form method="post" action="{{ route('user.updateuser',$users->uid) }}" >

		{{csrf_field()}}
<table>

<tr>
<td>
User ID:
</td>
<td>
<input type='text' name='uid' value="{{$users->uid}}" readonly/>
</td>
</tr>

<tr>
<td>
User Name:
</td>
<td>
<input type='text' name='userName' value="{{$users->userName}}"/>
</td>
</tr>

<tr>
<td>
Email:
</td>
<td>
<input type='text' name='email' value="{{$users->email}}" readonly/>
</td>
</tr>

<tr>
<td>
Password:
</td>
<td>
<input type='password' name='password' value="{{$users->password}}"/>
<div>
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
</td>
</tr>

<tr>
<td>
Address:
</td>
<td>
<input type='text' name='address' value="{{$users->address}}"/>
</td>
</tr>

<tr>
<td>
Phone:
</td>
<td>
<input type='text' name='phone' value="{{$users->phone}}"/>
</td>
</tr>

<tr>
<td>
Date Of Birth:
</td>
<td>
<input type='date' name='dob' value="{{$users->dob}}"/>
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
        <option value="{{ $userTypes->userTypeId}}" {{$userTypes->userTypeId==$users->userTypeId ? 'selected' : ''}}> {{ $userTypes->userTypeName }} </option>
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
