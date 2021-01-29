package clases;

public class Persona {

	private String nombre;
	private int edad;
	private char genero; // (H hombre, M mujer),
	private double peso;
	private double altura;
	static final char MASCULINO = 'H';

	public Persona() {
		this.nombre = "";
		this.edad = 0;
		this.genero = MASCULINO;
		this.peso = 0;
		this.altura = 0;
	}

	public Persona(String nombre, int edad, char genero) {
		this.nombre = nombre;
		this.edad = edad;
		this.genero = genero;
		this.peso = 0;
		this.altura = 0;
	}

	public Persona(String nombre, int edad, char genero, int peso, int altura) {
		this.nombre = nombre;
		this.edad = edad;
		this.genero = genero;
		this.peso = peso;
		this.altura = altura;
	}

	public int calcularIMC(double peso, double altura) {
		double imc = (altura * altura) / peso;
		int pesoIdeal = 1;

		if (imc < 20)
			pesoIdeal = -1;
		else if (imc >= 20 && imc <= 25)
			pesoIdeal = 0;

		return pesoIdeal;
	}

	public boolean esMayorDeEdad() {
		if (this.edad > 18)
			return true;
		else
			return false;
	}

	public void comprobaGenero(char genero) {
		if (genero == 'M')
			this.genero = 'M';
		else
			this.genero = MASCULINO;

	}

	@Override
	public String toString() {
		return "Persona [nombre=" + nombre + ", edad=" + edad + ", genero=" + genero + ", peso=" + peso + ", altura="
				+ altura + "]";
	}

}
