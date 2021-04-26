	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bienvenido a {{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <link rel="icon" href="/favicon.ico">
	<title>{{ config('app.name') }}</title>
	
	<link href="{{ asset("/css/bootstrap.min.css") }}" rel="stylesheet">
	<link href="{{ asset("/css/all.min.css") }}" rel="stylesheet">	
	<link href="{{ asset("/css/custom.css") }}" rel="stylesheet">
	<link href="{{ asset("/css/fontawesome.min.css") }}" rel="stylesheet">
	@yield('referencias_css')

	<script src="{{ asset("/js/jquery-3.3.1.min.js") }}"></script>       
	<script src="{{ asset("/js/bootstrap.min.js") }}"></script>   
	<script src="{{ asset("/js/index.js") }}"></script>    
	@yield('referencias_js')	
    

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116284903-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-116284903-1');
	</script>-->