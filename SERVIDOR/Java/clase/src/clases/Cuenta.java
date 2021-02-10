package clases;

public class Cuenta {

	private String titular;
	private double cantidad;

	public Cuenta(String titular) {
		this.titular = titular;
		this.cantidad = 0;
	}

	public Cuenta(String titular, double cantidad) {
		this.titular = titular;
		this.cantidad = cantidad;
	}

	public String getTitular() {
		return titular;
	}

	public void setTitular(String titular) {
		this.titular = titular;
	}

	public double getCantidad() {
		return cantidad;
	}

	public void setCantidad(double cantidad) {
		this.cantidad = cantidad;
	}

	@Override
	public String toString() {
		return "Cuenta [titular=" + titular + ", cantidad=" + cantidad + "]";
	}

	// METODOS
	public void ingresar(double cantidad) {
		if (cantidad > 0)
			this.cantidad = cantidad;
	}

	public void retirar(double cantidad) {
		this.cantidad -= cantidad;
		if (this.cantidad < 0)
			this.cantidad = 0;
	}

}
