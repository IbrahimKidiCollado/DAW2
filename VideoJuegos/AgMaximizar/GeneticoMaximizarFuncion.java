import java.util.Random;
import java.util.concurrent.ThreadLocalRandom;

public class GeneticoMaximizarFuncion {

    // ============================
    // CONFIGURACIÓN DEL AG
    // ============================
    static final int TAM_POBLACION = 20;
    static final int GENERACIONES = 100;
    static final double PROB_MUTACION = 0.2;
    static final double FUERZA_MUTACION = 0.5; // valor máximo a sumar/restar

    static Random rand = new Random();

    public static void main(String[] args) {

        // 1. Crear población inicial
        double[] poblacion = new double[TAM_POBLACION];
        for (int i = 0; i < TAM_POBLACION; i++) {
            poblacion[i] = generarValorAleatorio();
        }

        // 2. Bucle evolutivo
        for (int gen = 1; gen <= GENERACIONES; gen++) {

            // Mostrar mejor individuo de la generación actual
            double mejor = obtenerMejor(poblacion);
            System.out.println("Generación " + gen + " | Mejor: " + mejor + " | Fitness: " + fitness(mejor));

            // Crear nueva población
            double[] nuevaPoblacion = new double[TAM_POBLACION];

            for (int i = 0; i < TAM_POBLACION; i++) {

                // Seleccionar dos padres (TORNEO)
                double padre1 = seleccionarPadre(poblacion);
                double padre2 = seleccionarPadre(poblacion);

                // Cruce → generar hijo
                double hijo = cruzar(padre1, padre2);

                // Mutación
                hijo = mutar(hijo);

                // Limitar el valor al rango permitido
                hijo = limitarRango(hijo);

                nuevaPoblacion[i] = hijo;
            }

            poblacion = nuevaPoblacion;
        }

        // Resultado final
        double mejorFinal = obtenerMejor(poblacion);
        System.out.println("\n===============================");
        System.out.println("MEJOR SOLUCIÓN ENCONTRADA:");
        System.out.println("Valor: " + mejorFinal);
        System.out.println("Fitness: " + fitness(mejorFinal));
        System.out.println("===============================");
    }

    // Selección por torneo: elegir un padre
    static double seleccionarPadre(double[] poblacion) {
        double aleatorio = poblacion[rand.nextInt(TAM_POBLACION)];
        return aleatorio; // cambiar
    }

    // Cruce entre dos padres
    static double cruzar(double p1, double p2) {
        // TODO: implementar cruce (p. ej., promedio)
        double suma = p1 + p2;
        double media = suma / 2;
        return media; // cambiar
    }

    // Mutación
    static double mutar(double valor) {
        // TODO: mutar el valor con cierta probabilidad
        double minimo = -0.1;
        double maximo = 0.1;
        double random = minimo + (maximo - minimo) * rand.nextDouble();
        return random + valor; // cambiar
    }

    // Función objetivo: ajustar esta si quieren otro problema
    static double fitness(double x) {
        // TODO: definir función de fitnes
        double valor = x * Math.sin(x);
        return valor;
    }

    // Generar valor entre 0 y 10
    static double generarValorAleatorio() {
        // TODO: generar un número aleatorio entre 0 y 10
        double numeroAleatorio = ThreadLocalRandom.current().nextInt(0, 11);
        return numeroAleatorio;
    }

    // Limitar valor al intervalo [0, 10]
    static double limitarRango(double x) {
        if (x < 0)
            return 0;
        if (x > 10)
            return 10;
        return x;
    }

    // Obtener el mejor individuo de la población
    static double obtenerMejor(double[] poblacion) {
        double mejor = poblacion[0];

        for (double ind : poblacion) {
            if (fitness(ind) > fitness(mejor)) {
                mejor = ind;
            }
        }
        return mejor;
    }

}