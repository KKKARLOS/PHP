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
		<section id="sect-nos">
			<article id="frase-nos" class="animated">
				<p>
					<span class="negrita"
						>Nunca es demasiado tarde para empezar a cuidarte, ni demasiado pronto para empezar a
						prevenir".</span
					><br /><br />
					-Dr. Valentín Fuster-
				</p>
			</article>
			<h1>Sobre Nosotros</h1>
			<article id="chapa-nos">
				<p>
					Iniciamos nuestra actividad en Octubre de 1985, y estamos orgullosos de seguir dando hoy en
					día, un servicio personalizado y de calidad a nuestros clientes. Todo ello ha sido fruto de un
					intenso trabajo y de la colaboración de un gran equipo humano. <br />
					<br />
					Desde siempre hemos creído que mantenerse sano y en forma es uno de los factores más
					importantes en la vida de cada persona.<br />
					Nuestro objetivo principal es llevar a cabo un trabajo innovador y eficaz en la prestación de
					servicios deportivos enfocados al bienestar.<br />
					Contamos con instalaciones y servicios de calidad y un equipo de personas volcado en la
					atención individualizada y el diseño de nuevos programas de salud y deporte. <br />
					Mediante nuestros planes de ejercicio, diseñados a la medida de cada usuario, conseguimos que
					todos alcancen sus metas, al tiempo que disfrutan de una experiencia satisfactoria y única.<br />
				</p>
			</article>
		</section>
		<section id="sect-instalaciones">
			<h1>Nuestras Instalaciones</h1>
			<article id="intal-1" class="cont-foto-instal">
				<p class="text-foto-instal">Sala de Máquinas</p>
				<img
					class="foto-instal"
					src="imagenes/sala-maquinas.jpg"
					width="100%"
					alt="Sala de Máquinas"
					title="Sala de Máquinas"
				/>
			</article>
			<article id="intal-2" class="cont-foto-instal">
				<p class="text-foto-instal">Sala de Bicicletas</p>
				<img
					class="foto-instal"
					src="imagenes/Sala-bicicletas.jpg"
					width="100%"
					alt="Sala de Bicicletas"
					title="Sala de Bicicletas"
				/>
			</article>
			<article id="intal-3" class="cont-foto-instal">
				<p class="text-foto-instal">Sala de Pilates</p>
				<img
					class="foto-instal"
					src="imagenes/sala1 fitness.jpg"
					width="100%"
					alt="Sala de Pilates"
					title="Sala de Pilates"
				/>
			</article>
			<article id="intal-4" class="cont-foto-instal">
				<p class="text-foto-instal">Salón de Fisioestética</p>
				<img
					class="foto-instal"
					src="imagenes/sala-fisioestetica.jpg"
					width="100%"
					alt="Salón de Fisioestética"
					title="Salón de Fisioestética"
				/>
			</article>
		</section>

		<?php include("modulos/pie.php" ) ?>
		<a id="flecha" href="nosotros.php"><img src="imagenes/flecha.png" alt="" /></a>
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
				/*Fotos de instalaciones*/
				if ($(window).width() >= 640) {
					$(".text-foto-instal").hide();
					$(".cont-foto-instal").mouseover(function () {
						$("#" + this.id + " .text-foto-instal").slideDown();
					});
					$(".cont-foto-instal").mouseout(function () {
						$("#" + this.id + " .text-foto-instal").slideUp();
					});
				}
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
