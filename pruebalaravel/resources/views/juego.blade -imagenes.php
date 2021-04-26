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
		<h2>Adivina el número</h2>
		@isset($mensaje)
			<h3>{{$mensaje}}</h3>
		@endif
		@isset($imagen1)
			<a href="{{url('juego/1')}}"><img src="{{asset($imagen1)}}" width="100"></a>
		@else
			<a href="{{url('juego/1')}}"><img src="{{asset('images/ic_int.png') }}" width="100"></a>
		@endif		
		@isset($imagen2)
			<a href="{{url('juego/2')}}"><img src="{{asset($imagen2)}}" width="100"></a>
		@else
			<a href="{{url('juego/2')}}"><img src="{{asset('images/ic_int.png') }}" width="100"></a>
		@endif	
		@isset($imagen3)
			<a href="{{url('juego/3')}}"><img src="{{asset($imagen3)}}" width="100"></a>
		@else
			<a href="{{url('juego/3')}}"><img src="{{asset('images/ic_int.png') }}" width="100"></a>
		@endif			
	</div>
</body>
</html>