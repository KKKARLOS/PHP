<!doctype html>
<html lang="es">
<head>
<?php include("modulos/cabecera.php" ) ?>
</head>

<body id="body2" >
	<header id="cabecera2">
		<h1 id="logo">StarGym <br>Donosti</h1>
		
	</header>
	<!-- menu-->
	<?php include("modulos/menu.php" ) ?>
	<section id="sect-actividades">
      <div class="container">
        <h1>Kick Boxing</h1>
        <article>
			<p>El Kick Boxing es un deporte que combina patadas y golpes de puño, y en él tu cuerpo está en íntima relación con tu mente. A diferencia del Tae-Bo, en el Kick Boxing el contacto personal es muy importante porque se basa en movimientos de ataque y defensa personal entre dos adversarios que tienen un encuentro. <br> <br>En este deporte aprendes los golpes y patadas más comunes, las combinaciones de movimientos, las guardias y varios trucos de autodefensa. <br>Para ello necesitas protegerte con los guantes de box y el equipo protector que te recomiende tu instructor.
</p>
		</article>
      </div>
	</section>
	<section id="especificaciones">
      <div class="container">
  <article id="origen" >
    <div id="ac-tit1">
      <img  id="fotoflech1" src="imagenes/flecha-dx.png">
      <h2>Equipamiento</h2>
      
      </div>
    <div id="ac-txt1">
    	<p>Utilizamos un exclusivo equipamiento de resistencia, diseñado especialmente para mujeres, lo que permite a todas ellas una mejora y progresión continua gracias a la utilización de la resistencia tanto positiva como negativa.<br><br>Las socias de nuestro centro realizan su entrenamiento en un circuito compuesto por 20 estaciones, alternando entre estaciones de fuerza y aeróbicas. Al son de la música ejercitan el entrenamiento de forma divertida, dinámica y sin presiones bajo la supervisión de las monitoras. En tan sólo 30 minutos, se logra fortalecer y tonificar todos los grupos musculares, trabajando su sistema cardiovascular, mejorando la flexibilidad y quemando más calorías que en cualquier otro tipo de ejercicio. Este proceso permite a nuestras socias incrementar su metabolismo y fortalecer sus músculos, dando como resultado la pérdida de peso y lo que es más importante: reducción de talla.<br></p>
    </div>
  </article>
        <article id="objetivos">
          <div id="ac-tit2">
            <img id="fotoflech2" src="imagenes/flecha-dx.png">
            <h2>Beneficios</h2>
          </div>
          <div id="ac-txt2">
            <p>Las ventajas de este deporte son muchas, practícalo y muy pronto notarás sus excelentes resultados:<br>
			  <ol>
				  <li>Quemas calorías y defines tus músculos. Es un excelente trabajo aeróbico de alto impacto que te pone en forma porque tienes un desgaste de energía muy grande.</li>
				  <li>Incrementas tu fuerza y tu resistencia cardiopulmonar. Este deporte puede llegar a ser espectacular, pero la preparación física es muy demandante.</li>
				  <li>Practicas otros ejercicios. Paralelamente, es necesario que entrenes saltando la cuerda, corriendo y haciendo abdominales.</li>
				  <li>Aumentas tu coordinación y velocidad de reacción. Te enseña movimientos precisos que se hacen con velocidad para sorprender a tu rival.</li>
				  <li>Aprendes una técnica efectiva de autodefensa. Más que para atacar, el Kick Boxing sirve para defenderte de un ataque en un caso extremo.</li>
				  <li>Elevas tu autoestima. Saber pelear, cubrirte de los golpes y estar atenta para soltar las manos de forma inmediata, te dará una gran seguridad y confianza en ti misma.</li>
			 </ol>
			 Te recomendamos practicar este deporte por lo menos dos días a la semana en clases de una hora, para que obtengas un buen aprendizaje y vayas acondicionando poco a poco tu cuerpo y mente.</p>

			</div>
        </article>
     
      </div>
      
	</section>
      
		
	
	

	<?php include("modulos/pie.php" ) ?>
	<a id="flecha" href="kickboxing.php"><img src="imagenes/flecha.png" alt=""></a>
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
	/*acordeon*/
			$("#ac-txt1, #ac-txt2").hide();
			x=0

			$("#ac-tit1").click(function(){

				if(x==0){
				$("#ac-txt1").slideDown();
				document.getElementById("fotoflech1").src='imagenes/flecha-ab.png'

				$("#ac-txt2").slideUp();
				document.getElementById("fotoflech2").src='imagenes/flecha-dx.png'
				x=1
				}else{
				$("#ac-txt1").slideUp();
				document.getElementById("fotoflech1").src='imagenes/flecha-dx.png'
				x=0
				}

			});

			$("#ac-tit2").click(function(){

				if(x==0){
				$("#ac-txt2").slideDown();
				document.getElementById("fotoflech2").src='imagenes/flecha-ab.png'
				$("#ac-txt1").slideUp();
				document.getElementById("fotoflech1").src='imagenes/flecha-dx.png'
				
				x=1
				}else{
				$("#ac-txt2").slideUp();
				document.getElementById("fotoflech2").src='imagenes/flecha-dx.png'
				x=0
				}

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
		
		/*ENTRA FRASE EN NOSOTROS*/
		$(window).scroll(function() {
		
			$('#frase-nos').each(function(){
			var imagePos = $(this).offset().top;
			
			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+600) {
					$(this).addClass("slideInLeft");
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
