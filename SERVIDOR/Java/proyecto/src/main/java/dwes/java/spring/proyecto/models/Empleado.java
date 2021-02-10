package dwes.java.spring.proyecto.models;

import javax.validation.constraints.Email;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.Size;

public class Empleado {

	private long id;
	@NotEmpty
	@Size(min=3, max=100, message = "El nombre '${validateValue}' debe estar entre {min} y {max} caracteres")
	private String nombre;
	@NotEmpty
	private String telefono;
	@Email
	private String email;
	
	public Empleado() {
	}
	
	public Empleado(long id, String nombre, String telefono, String email) {
		this.id = id;
		this.nombre = nombre;
		this.telefono = telefono;
		this.email = email;
	}

	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getTelefono() {
		return telefono;
	}

	public void setTelefono(String telefono) {
		this.telefono = telefono;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	@Override
	public String toString() {
		return "Empleado [id=" + id + ", nombre=" + nombre + ", telefono=" + telefono + ", email=" + email + "]";
	}
	
	
}
