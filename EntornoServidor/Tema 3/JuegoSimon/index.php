<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			box-sizing: border-box;
			margin: 0;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			gap: 20px;
			height: 100vh;
			width: 100%;
			padding-top: 100px;
			padding-left: 30px;
			padding-right: 30px;
			padding-bottom: 30px;
			background-color: #2c3e50;
		}

		.contenedor-juego {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			grid-template-rows: repeat(2, 1fr);
			gap: 20px;
			width: 80vh;
			height: 80vh;
			max-width: 600px;
			max-height: 600px;
		}

		.cajas {
			background-color: grey;
			width: 100%;
			height: 100%;
			cursor: pointer;
			border-radius: 20px;
			border: 6px solid #34495e;
			transition: all 0.2s ease;
			box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
		}

		.c1 {
			background-color: #e74c3c;
		}

		.c2 {
			background-color: #2ecc71;
		}

		.c3 {
			background-color: #3498db;
		}

		.c4 {
			background-color: #f1c40f;
		}

		.cajas.activa {
			filter: brightness(1.8);
			transform: scale(1.05);
			box-shadow: 0 0 30px white;
		}

		#juegoBoton {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 80px;
			text-decoration: none;
			border: none;
			border-radius: 0;
			background-color: #ed3dfdff;
			color: white;
			font-size: 1.5em;
			font-weight: bold;
			text-transform: uppercase;
			padding: 0;
			margin: 0;
			cursor: pointer;
			z-index: 1000;
			transition: background-color 0.3s ease;
		}

		#juegoBoton:hover {
			background-color: #f79fffff;
		}
	</style>
	<title>Juego del Simon</title>
</head>

<body>
	<div class="contenedor-juego">
		<div class="cajas c1" id="rojo"></div>
		<div class="cajas c2" id="verde"></div>
		<div class="cajas c3" id="azul"></div>
		<div class="cajas c4" id="amarillo"></div>
	</div>

	<input type="submit" id="juegoBoton" value="EMPEZAR PARTIDA">

	<script>
		const colores = ["rojo", "verde", "azul", "amarillo"];
		let contador = 1;
		let secuencia = [];
		let respuesta = [];
		const botonJuego = document.getElementById('juegoBoton');

		function generaRandom() {
			return Math.floor(Math.random() * 4);
		}

		function darleColor() {
			return colores[generaRandom()];
		}

		function validarRespuesta() {
			if (respuesta.length !== secuencia.length) {
				return false;
			}
			return secuencia.join('') === respuesta.join('');
		}

		function mostrarPerdida() {
			botonJuego.value = `¡FALLASTE en Nivel ${contador}! Clic para Reintentar.`;
			contador = 1;
			secuencia = [];
			respuesta = [];
			botonJuego.addEventListener("click", manejarInicio);
		}

		function escucharRespuesta(event) {
			respuesta.push(event.target.id);
			event.target.classList.add("activa");
			setTimeout(() => {
				event.target.classList.remove("activa");
			}, 100);

			if (respuesta.length === secuencia.length) {
				manejarEnvio();
			}
		}

		function desactivarEscuchaUsuario() {
			colores.forEach(id => {
				document.getElementById(id).removeEventListener("click", escucharRespuesta);
			});
			botonJuego.removeEventListener("click", manejarEnvio);
		}

		function mostrarSecuencia(secuencia) {
			const RETRASO_INICIAL = 1000;
			let retrasoTotal = RETRASO_INICIAL;

			const duracionLuz = 500;
			const duracionPausa = 200;

			for (let i = 0; i < secuencia.length; i++) {
				const idColor = secuencia[i];

				setTimeout(() => {
					document.getElementById(idColor).classList.add("activa");
				}, retrasoTotal);

				setTimeout(() => {
					document.getElementById(idColor).classList.remove("activa");
				}, retrasoTotal + duracionLuz);

				retrasoTotal += duracionLuz + duracionPausa;
			}

			setTimeout(() => {
				activarEscuchaUsuario();
			}, retrasoTotal);
		}

		function activarEscuchaUsuario() {
			botonJuego.value = "ENVIAR RESPUESTA";

			colores.forEach(id => {
				document.getElementById(id).addEventListener("click", escucharRespuesta, false);
			});

			botonJuego.addEventListener("click", manejarEnvio);
		}

		function manejarEnvio() {
			desactivarEscuchaUsuario();

			if (validarRespuesta()) {
				contador++;
				botonJuego.value = `¡CORRECTO! Nivel ${contador} - OBSERVE`;
				secuencia = [];
				respuesta = [];

				setTimeout(partida, 1500);

			} else {
				mostrarPerdida();
			}
		}

		function partida() {
			secuencia = [];
			respuesta = [];
			botonJuego.removeEventListener("click", manejarEnvio);

			for (let i = 1; i <= contador; i++) secuencia.push(darleColor());

			mostrarSecuencia(secuencia);
		}

		function manejarInicio() {
			botonJuego.removeEventListener("click", manejarInicio);
			partida();
		}

		document.addEventListener('DOMContentLoaded', () => {
			botonJuego.value = "EMPEZAR PARTIDA";
			botonJuego.addEventListener("click", manejarInicio);
		});
	</script>
</body>

</html>