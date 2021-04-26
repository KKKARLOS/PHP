//función autoinvocada
(function () {
	var formulario = document.formulario_registro;
	var elementos = formulario.elements;

	//functions

	var focusInput = function () {
		this.parentElement.children[1].className = "label active";
	};

	var blurInput = function () {
		if (this.value <= 0) {
			this.parentElement.children[1].className = "label";
		}
	};

	// --- Eventos ---

	for (var i = 0; i < elementos.length; i++) {
		if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "textarea") {
			elementos[i].addEventListener("focus", focusInput);
			elementos[i].addEventListener("blur", blurInput);
		}
	}
})();
