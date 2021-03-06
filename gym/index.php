<!DOCTYPE html>
<html lang="es">
	<head>
	<?php include("modulos/cabecera.php" ) ?>
	 </head>

	<body class="foto-fondo">
		<header id="cabecera1">
			<h1 id="logo">StarGym <br />Donosti</h1>
		</header>
		<!-- menu-->
		<?php include("modulos/menu.php" ) ?>

		<section id="actividades">
			<div class="container">
				<h1>ACTIVIDADES</h1>
				<img src="imagenes/gimn2.jpg" alt="Actividades" id="act-foto" class="animated" />
				<!--Si quiero vincular la hoja que he bajado tengo que cambiar tambien la primera clase-->

				<div class="copy">
					<p>
						Vestibulum euismod odio quis pretium hendrerit. Pellentesque fringilla suscipit ipsum ut
						euismod. Phasellus quis porttitor eros, vitae luctus est. Vivamus ut porta massa.
						Suspendisse id erat placerat, pulvinar nunc at, fringilla risus. Aliquam erat volutpat.
						Vestibulum euismod odio quis pretium hendrerit. Pellentesque fringilla suscipit ipsum ut
						euismod. Phasellus quis porttitor eros, vitae luctus est. Vivamus ut porta massa.
						Suspendisse id erat placerat, pulvinar nunc at, fringilla risus. Aliquam erat volutpat.
					</p>
					<a href="pilates.html" class="enlaserv">Pilates</a>
					<a href="vibrofitness.html" class="enlaserv">Vibrofitness</a>
					<a href="kickboxing.html" class="enlaserv">Kickboxing</a>
					<a href="fitexp.html" class="enlaserv">Fitness Express</a>
				</div>
			</div>
		</section>

		<section id="servicios">
			<div class="container">
				<h1>SERVICIOS</h1>

				<img src="imagenes/servicios.jpg" alt="servicios" id="serv-foto" class="animated" />
				<!--Si quiero vincular la hoja que he bajado tengo que cambiar tambien la primera clase-->

				<div class="copy">
					<p>
						Vestibulum euismod odio quis pretium hendrerit. Pellentesque fringilla suscipit ipsum ut
						euismod. Phasellus quis porttitor eros, vitae luctus est. Vivamus ut porta massa.
						Suspendisse id erat placerat, pulvinar nunc at, fringilla risus. Aliquam erat
						volutpat.Vestibulum euismod odio quis pretium hendrerit. Pellentesque fringilla suscipit
						ipsum ut euismod. Phasellus quis porttitor eros, vitae luctus est. Vivamus ut porta massa.
						Suspendisse id erat placerat, pulvinar nunc at, fringilla risus. Aliquam erat volutpat.
					</p>
					<a href="" class="enlaserv2">Adelgazamiento</a> <a href="" class="enlaserv2">Fisioterapia</a>
				</div>
			</div>
		</section>

		<?php include("modulos/pie.php" ) ?>
		<a id="flecha" href="#cabecera1"><img src="imagenes/flecha.png" alt="" /></a>

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
				//flecha top
				$(window).scroll(function () {
					if ($(window).scrollTop() > 600) {
						$("#flecha").css({ opacity: "1" });
					} else {
						$("#flecha").css({ opacity: "0" });
					}
				});
			});
			/*SLIDER FONDO*/
			if ($(window).width() >= 640) {
				jQuery.backstretch(
					[
						"imagenes/foto-slider02.jpg",
						"imagenes/foto-slider03.jpg",
						"imagenes/foto-slider04.jpg",
						"imagenes/foto-slider05.jpg",
					],
					{ duration: 3000, fade: 1000 }
				);
			} else {
				$("body").addClass("foto-fondo");
			}
			/*ENTRA FOTO ACTIVIDADES Y SERVICIOS*/
			$(window).scroll(function () {
				$("#act-foto").each(function () {
					var imagePos = $(this).offset().top;

					var topOfWindow = $(window).scrollTop();
					if (imagePos < topOfWindow + 500) {
						$(this).addClass("slideInLeft");
					}
				});

				$("#serv-foto").each(function () {
					var imagePos2 = $(this).offset().top;

					var topOfWindow = $(window).scrollTop();
					if (imagePos2 < topOfWindow + 600) {
						$(this).addClass("slideInRight");
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
