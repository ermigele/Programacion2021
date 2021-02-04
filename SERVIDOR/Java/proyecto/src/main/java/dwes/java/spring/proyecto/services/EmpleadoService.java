package dwes.java.spring.proyecto.services;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import javax.annotation.PostConstruct;

import org.springframework.stereotype.Service;

import dwes.java.spring.proyecto.models.Empleado;

@Service
public class EmpleadoService {
	
	private List<Empleado> repositorio = new ArrayList<>();
	
	
	public Empleado add(Empleado e) {
		repositorio.add(e);
		return e;
	}
	
	public List<Empleado> findAll() {
		return repositorio;
	}
	
	@PostConstruct
	public void init() {
		repositorio.addAll(
				Arrays.asList(new Empleado(1,"Antonio García", "antonio.garcia@email.net", "954000001"),
						new Empleado(2,"María López", "maria.lopez@email.net", "954000010"),
						new Empleado(3,"Marta Angulo", "marta.angulo@email.net", "954000200")						
						)
				);
	}

}