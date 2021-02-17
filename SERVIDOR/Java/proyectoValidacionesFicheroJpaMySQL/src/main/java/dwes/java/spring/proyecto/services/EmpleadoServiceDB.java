package dwes.java.spring.proyecto.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;

import dwes.java.spring.proyecto.models.Empleado;
import dwes.java.spring.proyecto.repository.EmpleadoRepository;

public class EmpleadoServiceDB implements EmpleadoService{
	
	@Autowired
	private EmpleadoRepository repositorio;

	@Override
	public Empleado add(Empleado e) {
		return repositorio.save(e);
	}

	@Override
	public List<Empleado> findAll() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public Empleado findById(long id) {
		return repositorio.findById(id).orElse(null);
	}

	@Override
	public Empleado edit(Empleado e) {
		// TODO Auto-generated method stub
		return null;
	}

}
