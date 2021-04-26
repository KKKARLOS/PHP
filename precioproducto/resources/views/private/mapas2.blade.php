@extends('layouts.privada')
@section('content')
<script type='text/javascript'>var centreGot = false;</script>
{!! $marker['map_js'] !!}
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Mapas</div>

                <div class="panel-body">
                    {!!$map['html']!!}           
                </div>
            </div>
        </div>
    </div>

	@if(Auth::user()->hasRole('admin'))
	    <div>Acceso como administrador</div>
	@else
	    <div>Acceso usuario</div>
	@endif
	@if(Auth::user()->hasRole('superadmin'))
	    <div>Acceso como superadministrador</div>
	@endif    
</div>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

</script>    
@endsection