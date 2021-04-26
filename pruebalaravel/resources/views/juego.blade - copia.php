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
		<ul>
			<a href="{{url('juego/1')}}"><li>1</li></a>
			<a href="{{url('juego/2')}}"><li>2</li></a>
			<a href="{{url('juego/3')}}"><li>3</li></a>
		</ul>

		<ul>
			@for ($i = 1; $i < 4; $i++)
				<a href="{{url('juego/'.$i)}}">
			    	<li>{{ $i }}</li></a>
			@endfor
		</ul>
		<ul>
			@for ($i = 1; $i < 4; $i++)
				<a href='{{url("juego/$i")}}'>
			    	<li>{{ $i }}</li></a>
			@endfor
		</ul>
		<ul>
			@for ($i = 1; $i < 4; $i++)
				<a href="{{route('jugar',['numero'=>$i])}}">
			    	<li>{{ $i }}</li></a>
			@endfor
		</ul>
	</div>
</body>
</html>