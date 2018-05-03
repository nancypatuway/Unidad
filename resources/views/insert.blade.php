<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Insert</title>
</head>
<body>
	<form action="store" method="post" enctype="multipart/form-data" >
		<label for="name">Name</label>
		<input type="text" name="name" value="{{old('name')}}" id="name" autocomplete="off">
		<br>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<br>
		<label for="email">Email</label>
		<input type="text" name="email" value="{{old('email')}}" id="email" autocomplete="off">
		<br>
		<br>
		Country&nbsp;&nbsp;<select name="country" id="country">
			<option value="usa">USA</option>
			<option value="costarica">CostaRica</option>
			<option value="panama">Panama</option>
			<option value="colombia">Colombia</option>	
		</select>
		<br>
		Gender&nbsp;&nbsp;<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female
		<br>
		<br>
		<input type="checkbox" name="favorite[]" value="south">South
		<input type="checkbox" name="favorite[]" value="north">North
		<input type="checkbox" name="favorite[]" value="east">East
		<input type="checkbox" name="favorite[]" value="west">West
		<br>
		<br>
		<input type="file" name="image">
		<br>



		<br>
		<br>
		<label for="submit"></label>
		<input type="submit" name="submit" value="submit" id="submit">
		
	</form>


		
	
	
</body>
</html>
@foreach($errors->all() as $error)
<ul>
	<li style="color:red;">{{$error}}</li>
</ul>
@endforeach