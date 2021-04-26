<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("modulos/cabecera.php" ) ?>
	</head>

	<body id="body2">
		<header id="cabecera2">
			<h1 id="logo">StarGym <br />Donosti</h1>
		</header>
		<!-- menu-->
		<?php include("modulos/menu.php" ) ?>
		<section id="sect-actividades">
			<div class="container">
				<h1>Fitness Express</h1>
				<article>
					<p>
						Para complementar los beneficios del Pilates con trabajo cardiovascular, contamos con un
						Circuito de Fitness Express en el que las mujeres ajetreadas y sin horarios definidos
						pueden ponerse en forma en sesiones de tan sólo 30 minutos.<br /><br />Sus máquinas están
						especialmente diseñadas para que mujeres de cualquier peso, edad, talla y condición
						física, puedan utilizarlas a su propio ritmo. Al compás de la música, se combina trabajo
						con máquinas, ejercicios aeróbicos y de desarrollo de fuerza y estiramientos, ideados para
						ponerse en forma y quemar la grasa corporal.
					</p>
				</article>
			</div>
		</section>
		<section id="especificaciones">
			<div class="container">
				<article id="origen">
					<div id="ac-tit1">
						<img id="fotoflech1" src="imagenes/flecha-dx.png" />
						<h2>Equipamiento</h2>
					</div>
					<div id="ac-txt1">
						<p>
							Utilizamos un exclusivo equipamiento de resistencia, diseñado especialmente para
							mujeres, lo que permite a todas ellas una mejora y progresión continua gracias a la
							utilización de la resistencia tanto positiva como negativa.<br /><br />Las socias de
							nuestro centro realizan su entrenamiento en un circuito compuesto por 20 estaciones,
							alternando entre estaciones de fuerza y aeróbicas. Al son de la música ejercitan el
							entrenamiento de forma divertida, dinámica y sin presiones bajo la supervisión de las
							monitoras. En tan sólo 30 minutos, se logra fortalecer y tonificar todos los grupos
							musculares, trabajando su sistema cardiovascular, mejorando la flexibilidad y
							quemando más calorías que en cualquier otro tipo de ejercicio. Este proceso permite a
							nuestras socias incrementar su metabolismo y fortalecer sus músculos, dando como
							resultado la pérdida de peso y lo que es más importante: reducción de talla.<br />
						</p>
					</div>
				</article>
				<article id="objetivos">
					<div id="ac-tit2">
						<img id="fotoflech2" src="imagenes/flecha-dx.png" />
						<h2>Beneficios</h2>
					</div>
					<div id="ac-txt2">
						<p>Beneficios del entrenamiento por intervalos de máquinas: <br /></p>
						<ul>
							<li>
								En tan sólo 30 minutos quema más calorías que cualquier otra forma de ejercicio.
							</li>
							<li>
								Desarrolla la musculatura: se trabajan los principales músculos y se alcanza un
								nivel del 35% de fatiga muscular (justo lo necesario para estimular la actividad
								celular sin lastimar los músculos).
							</li>
							<li>
								Puede cambiar la figura más rápido que cualquier otro tipo de ejercicio debido a
								que se quema grasa y se desarrolla músculo durante el entrenamiento con
								resistencia. A medida que se quema grasa, se incrementa la energía y se
								desarrolla la musculatura. El músculo ocupa menos espacio que la grasa,
								permitiendo la pérdida de centímetros y no de peso.
							</li>
						</ul>
					</div>
				</article>
			</div>
		</section>

		<?php include("modulos/pie.php" ) ?>
		<a id="flecha" href="#cabecera2"><img src="imagenes/flecha.png" alt="" /></a>
		<!--Menu Hamburguesa-->
		<script>
			$(document).ready(function () {
				x = 0; //oculto

				$(".menu_bar").click(function () {
					if (x == 0) {
						$("#topnav").animate({ left: "0px" });
						x = 1;
					} else {
						$("#topnav").animate({ left: "-100%" });
						x = 0;
					}
				});

				//mostramos y ocultamos submenus
				$(".submenu").click(function () {
					$(this).children(".children").slideToggle();
				});

				//poner tope al menu con scrollTop
				var stickyNavTop = $("#topnav").offset().top;

				var stickyNav = function () {
					var scrollTop = $(window).scrollTop();
					if (scrollTop > stickyNavTop) {
						$("#topnav").addClass("navpeque");
					} else {
						$("#topnav").removeClass("navpeque");
					}
				};

				// mientras bajamos con el scroll va ejecutando la funcion

				$(window).scroll(function () {
					stickyNav();
				});
				/*acordeon*/
				$("#ac-txt1, #ac-txt2").hide();
				x = 0;

				$("#ac-tit1").click(function () {
					if (x == 0) {
						$("#ac-txt1").slideDown();
						document.getElementById("fotoflech1").src = "imagenes/flecha-ab.png";

						$("#ac-txt2").slideUp();
						document.getElementById("fotoflech2").src = "imagenes/flecha-dx.png";
						x = 1;
					} else {
						$("#ac-txt1").slideUp();
						document.getElementById("fotoflech1").src = "imagenes/flecha-dx.png";
						x = 0;
					}
				});

				$("#ac-tit2").click(function () {
					if (x == 0) {
						$("#ac-txt2").slideDown();
						document.getElementById("fotoflech2").src = "imagenes/flecha-ab.png";
						$("#ac-txt1").slideUp();
						document.getElementById("fotoflech1").src = "imagenes/flecha-dx.png";

						x = 1;
					} else {
						$("#ac-txt2").slideUp();
						document.getElementById("fotoflech2").src = "imagenes/flecha-dx.png";
						x = 0;
					}
				});
				//flecha top
				$(window).scroll(function () {
					if ($(window).scrollTop() > 600) {
						$("#flecha").css({ opacity: "1" });
					} else {
						$("#flecha").css({ opacity: "0" });
					}
				});
			});

			/*ENTRA FRASE EN NOSOTROS*/
			$(window).scroll(function () {
				$("#frase-nos").each(function () {
					var imagePos = $(this).offset().top;

					var topOfWindow = $(window).scrollTop();
					if (imagePos < topOfWindow + 600) {
						$(this).addClass("slideInLeft");
					}
				});
			});
			/*formulario*/
			jQuery(".miform").foxholder({
				placeholderDemo: 2,
				buttonDemo: 5,
			});
		</script>
	</body>
</html>
