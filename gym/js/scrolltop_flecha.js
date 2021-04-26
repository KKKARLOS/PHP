// JavaScript Document
$(function(){
	//click en un enlace de la lista
	$('#flecha').on('click',function(e){ //OJO QUE ESTE SELECTOR SOLO SIRVE EN ESTE EJEMPLO QUE SOLO TENGO UNMENU
		//prevenir el comportamiento predeterminado del enlace
		e.preventDefault();
		//obtenemos el id del elemento en el que debemos posicionarnos
		var strAncla=$(this).attr('href');
		
		//utilizamos body y html, ya que dependiendo del navegardor uno u otro no funciona
		$('body, html').stop(true,true).animate({
			//realizamos la animacion hacia el ancla
			scrollTop: $(strAncla).offset().top
		
		},500);
	});
});