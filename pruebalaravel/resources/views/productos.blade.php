<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<strong>Productos</strong></br></br>
	@isset($numero)
			@for ($i = 1; $i <= $numero; $i++)	
				Producto{{$i}}
       			@if ($premio==$i) &nbsp;premiado
       			@endif
			</br>	

			@endfor		

	@else
			<h3>No hay productos</h3>
	@endif
</body>
</html>