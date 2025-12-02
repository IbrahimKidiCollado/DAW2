
import java.util.Random;

public class GeneticoEncontrarPalabra {

	static final String OBJETIVO = "DAW2025";
	static final String GENES = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	static final int POPULATION_SIZE = 50;
	static final double RATIO_MUTACION = 0.16;

	static Random rand = new Random();

	public static void main(String[] args) {

		// Crear población inicial
		String[] poblacion = new String[POPULATION_SIZE];
		for (int i = 0; i < POPULATION_SIZE; i++) {
			poblacion[i] = generarIndividuoAleatorio();
		}

		int generacion = 0;

		while (true) {
			generacion++;

			// Evaluar población y obtener el mejor individuo
			String mejor = getMejorIndividuo(poblacion);

			// Mostrar estado
			System.out.println("Generación " + generacion + " | Mejor: " + mejor +
					" | Fitness: " + fitness(mejor));

			// ¿Hemos llegado a la solución?
			if (mejor.equals(OBJETIVO)) {
				System.out.println("\n¡Objetivo encontrado!");
				break;
			}

			// Crear nueva población usando el mejor como base
			String[] nuevaPoblacion = new String[POPULATION_SIZE];
			for (int i = 0; i < POPULATION_SIZE; i++) {
				nuevaPoblacion[i] = mutar(mejor);
			}

			poblacion = nuevaPoblacion;
		}
	}

	// -------------------------------------------------------
	// Funciones del algoritmo genético
	// -------------------------------------------------------

	// Genera una cadena aleatoria
	static String generarIndividuoAleatorio() {
		StringBuilder sb = new StringBuilder();

		for (int i = 0; i < OBJETIVO.length(); i++) {
			int pos = rand.nextInt(GENES.length());
			sb.append(GENES.charAt(pos));
		}

		return sb.toString();
	}

	// Devuelve cuántos caracteres coinciden con la palabra objetivo
	static int fitness(String individual) {
		int puntuacion = 0;

		for (int i = 0; i < OBJETIVO.length(); i++) {
			if (individual.charAt(i) == OBJETIVO.charAt(i)) {
				puntuacion++;
			}
		}

		return puntuacion;
	}

	// Selecciona el mejor individuo de la población
	static String getMejorIndividuo(String[] population) {
		String best = population[0];

		for (String ind : population) {
			if (fitness(ind) > fitness(best)) {
				best = ind;
			}
		}

		return best;
	}

	// Aplica mutaciones aleatorias a un individuo
	static String mutar(String individual) {
		StringBuilder sb = new StringBuilder(individual);

		for (int i = 0; i < sb.length(); i++) {
			if (rand.nextDouble() < RATIO_MUTACION) {
				int pos = rand.nextInt(GENES.length());
				sb.setCharAt(i, GENES.charAt(pos));
			}
		}

		return sb.toString();
	}
}