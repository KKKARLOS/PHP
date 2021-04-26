@extends('layouts.public')

@section('titulo')
  Bienvenido/a
@endsection
@section('seleccionado3')
  active
@endsection
@section('css')
<!-- insert los css propios de la página -->
<style> 
.foto{ width:130px;height:212px }
</style>
@endsection

@section('content')
	<div class="container">
		<h1>Contacto</h1>
		<div class="contact-form">		
			<div class="col-md-8 contact-grid">
				<form>	
					<input type="text" value="Nombre" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Nombre';}">
				
					<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
					<input type="text" value="Asunto" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Asunto';}">
					
					<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Mensaje';}">Mensaje</textarea>
					<div class="send">
						<input type="submit" value="Enviar">
					</div>
				</form>
			</div>
			<div class="col-md-4 contact-in">

					<div class="address-more">
					<h4>Dirección</h4>
						<p>Berio Paseo lekua 50,</p>
						<p>20018 - Donostia (San Sebastian) </p>
						<p>España</p>
					</div>
					<div class="address-more">
					<h4>Atención al público</h4>
						<p>De lunes a viernes de 9:00 a 19:00</p>
						<p>Tel:943 316 900</p>
						<p>Fax:190-4509-494</p>
						<p>Email:<a href="mailto:contact@example.com"> contact@example.com</a></p>

					</div>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		<!---728x90--->

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2441.558016472032!2d-2.0185741017197008!3d43.30341123946063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51b0708baa02bb%3A0x4b55a087d653821b!2sCebanc!5e0!3m2!1ses!2sin!4v1555017612594!5m2!1ses!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
@endsection	