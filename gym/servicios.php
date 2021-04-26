<!doctype html>
<html lang="es">
<head>
<?php include("modulos/cabecera.php" ) ?>
</head>

<body id="body2" class="foto-fondo">
	<header id="cabecera2">
		<h1 id="logo">StarGym <br>Donosti</h1>
		
	</header>
	<!-- menu-->
	<?php include("modulos/menu.php" ) ?>
	<section id="adel">
		<div class="container">
			<h1>ADELGAZAMIENTO</h1>
			<p>Hemos desarrollado un circuito innovador, completo, eficaz y definitivo para tratar la obesidad y el sobrepeso, atacar la celulitis y remodelar el cuerpo de forma natural, sin riesgos y sin química.</p>
			<h2>Circuito VSF de adelgazamiento</h2>
			<p>El éxito de nuestro CIRCUITO VSF DE ADELGAZAMIENTO se fundamenta en nuestros protocolos así como en la integración de los siguientes recursos:<br>
	 <ul>
		<li>Consulta dietética</li>
		<li>Nutri Energetics Systems</li>
		<li>Test de intolerancia alimentaria</li>
		<li>Medidor de grasa corporal</li>
		<li>VSF3 - (tecnología basada en el uso combinado de la doble cavitación, endomasaje y sonoforesis)</li>
		<li>VSF TERMO</li>
		<li>VSF PRESO</li>
		<li>VSF ELECTRO</li>
		<li>VIBRO-Fitness</li>
		<li>Productos Drenantes y Reductores</li>
	</ul>
		
		El CIRCUITO VSF SLIM DE ADELGAZAMIENTO nos permite combatir la obesidad, el sobrepeso, atacar la celulitis, mejorar la circulación reafirmar y modelar. <br></p>
		</div>
	</section>
	
	<section id="fisio">
		<div class="container">	
			<h1>FISIOESTÉTICA</h1>
			
			<p>Contamos con la aparatología perfecta y la tecnología más moderna y segura para lograr que tus objetivos sean un hecho.<br>La tecnología más  novedosa, segura  y eficaz  que existe en la actualidad para atacar la celulitis, combatir la  flacidez y remodelar el cuerpo.<br>Hemos diseñado programas específicos para cada zona de tu cuerpo:
			
			<ul>
				<li>TRATAMIENTO ANTICELULÍTICO</li>
				<li>DRENAJE LINFÁTICO</li>
				<li>TRATAMIENTO ANTIFLACCIDEZ</li>
				<li>TRATAMIENTO LOCALIZADO (ABDOMINAL + GLÚTEOS)</li>
				<li>TRATAMIENTO CIRCULATORIO</li>
				<li>TRATAMIENTO PIERNAS CANSADAS</li>
			</ul>
			
			Para conseguirlo contamos  con 3 técnicas: <br>
			
			<ul>
				<li>ENDOMASAJE - Masaje profundo que trabaja en el ámbito de la hipodermis. Es un masaje de despegue, de succión desde el interior al exterior. Aumenta el riego de sangre y linfa, mejora la elasticidad y tono de la piel. </li>
				<li>SONOFORESIS - Gracias al producto aplicado y por efecto sonoforético realizamos una penetración de principios activos y enzimas consiguiendo un aporte importante de nutrientes.</li> 
				<li>LA DOBLE CAVITACIÓN - es un extraordinario efecto generado por dos ondas de frecuencias distintas, que actúan de forma combinada, generando un elevado aumento de temperatura y creando una lipólisis ofreciendo un resultado muy similar al de una liposucción.</li>
			</ul>
			<h2>Beneficios</h2>
			Efectos de las técnicas combinadas:<br>
			<ul>
				<li>Eliminación de celulitis y nódulos adiposos. Nuestra tecnología y nuestro personal altamente cualificado garantizan la eliminación de la piel de naranja.</li>
				<li>Notable reducción de la ansiedad e incremento de la energía.</li>
				<li>Oxigenación y fomento de la vascularización de la piel. Nuestro método no sólo ataca la grasa y la celulitis sino que también nutre y aporta salud adicional a la piel.</li>
				<li>Drenaje de líquidos. Al tratarse de ultrasonidos y de vibraciones, el cuerpo expulsa los excesos de agua retenida que producen hinchamiento de la figura perfilando así una silueta más fina y saludable.</li>
				<li>Mejora de la circulación sanguínea. El cuerpo, al ver sus músculos expuestos a un esfuerzo (aunque éste no sea costoso para la persona), pondrá en marcha el sistema sanguíneo de una manera más activa para abastecer la demanda de oxígeno por parte de los músculos. Indirectamente, esa sangre “se abrirá paso” por venas y arterias evitando que la grasa las oprima, por lo tanto reduciendo riesgos de enfermedades cardiovasculares.</li>
				<li>Tono y elasticidad de los tejidos. Al igual que la piel nota una mejora en su tonalidad y textura, los tejidos corporales también gozan de una apreciable mejoría.</li>
			</ul></p>

			
		</div>
	</section>

	
	<?php include("modulos/pie.php" ) ?>
	<a id="flecha" href="servicios.php"><img src="imagenes/flecha.png" alt=""></a>
<!--Menu Hamburguesa-->
	<script>
		$(document).ready(function(){
			x=0 //oculto
			
			$(".menu_bar").click(function(){
				if(x==0){
					$("#topnav").animate({left:"0px"});
					x=1
				}else{
					$("#topnav").animate({left:"-100%"});
					x=0
				}
				
			});
			
			//mostramos y ocultamos submenus
			$(".submenu").click(function(){	
				$(this).children('.children').slideToggle();
			
			});
			
		//poner tope al menu con scrollTop
			var stickyNavTop = $('#topnav').offset().top;
			
			var stickyNav=function(){
				var scrollTop= $(window).scrollTop();
				if (scrollTop > stickyNavTop){
				
				$('#topnav').addClass('navpeque');
					
			} else {
				
				$('#topnav').removeClass('navpeque');
			}
			};
			
			// mientras bajamos con el scroll va ejecutando la funcion
			
			$(window).scroll(function(){
			stickyNav();
		});
			//flecha top
			$(window).scroll(function(){
				
				if($(window).scrollTop()>600){
					$("#flecha").css({ opacity:"1"});
				}else{
					$("#flecha").css({ opacity:"0"});
				}
			});
			
		});
			
		/*ENTRA FOTO ACTIVIDADES Y SERVICIOS*/
		$(window).scroll(function() {
		
			$('#act-foto').each(function(){
			var imagePos = $(this).offset().top;
			
			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+800) {
					$(this).addClass("slideInLeft");
				}
			});	
		
			$('#serv-foto').each(function(){
			var imagePos2 = $(this).offset().top;
			
			var topOfWindow = $(window).scrollTop();
				if (imagePos2 < topOfWindow+600) {
					$(this).addClass("slideInRight");
				}
			});
		
	});
		/*formulario*/
		 jQuery('.miform').foxholder({
    placeholderDemo: 2, 
    buttonDemo: 5
  });
		
		
	</script>
</body>
</html>
