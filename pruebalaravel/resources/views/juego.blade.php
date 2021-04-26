<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style>
	ul{
		display:inline-block;
	}
	ul li{
		width:20px;
	}
</style>
</head>
<body>
	<div id="container">
		<h2>Adivina el número {{Session::get('welcome')}}</h2>
		@isset($mensaje)
			<h3>{{$mensaje}}</h3>
			@for ($i = 1; $i < 4; $i++)
				@if ($i==$numero && $premio==true) 
					<a href='{{url("juego/$i")}}'><img src="{{asset('images/ic_premio.png') }}" width="100"></a>
				@elseif ($i==$numero && $premio==false)
					<a href='{{url("juego/$i")}}'><img src="{{asset('images/ic_cal.png') }}" width="100"></a>
				@else 
					<a href='{{url("juego/$i")}}'><img src="{{asset('images/ic_int.png') }}" width="100"></a>					
				@endif
			@endfor	
		@else
			@for ($i = 1; $i < 4; $i++)	
					<a href='{{url("juego/$i")}}'><img src="{{asset('images/ic_int.png') }}" width="100"></a>				
			@endfor				
		@endif

	
	</div>
</body>
</html>