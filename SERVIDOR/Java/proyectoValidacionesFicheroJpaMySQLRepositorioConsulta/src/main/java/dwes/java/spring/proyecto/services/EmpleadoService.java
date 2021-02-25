package dwes.java.spring.proyecto.services;

import java.util.List;

import dwes.java.spring.proyecto.models.Empleado;

public interface EmpleadoService {

	public Empleado add(Empleado e);
	public List<Empleado> findAll();
	public Empleado findById(long id);
	public Empleado edit(Empleado e);
	
}
