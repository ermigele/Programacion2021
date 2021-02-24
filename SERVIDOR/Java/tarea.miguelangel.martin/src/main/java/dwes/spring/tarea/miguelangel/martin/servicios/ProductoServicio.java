package dwes.spring.tarea.miguelangel.martin.servicios;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import dwes.spring.tarea.miguelangel.martin.modelos.Producto;
import dwes.spring.tarea.miguelangel.martin.repositorio.ProductoRepositorio;

@Service
public class ProductoServicio {
	
	@Autowired
	private ProductoRepositorio repositorio;
	

	public Producto save(Producto p) {
		return repositorio.save(p);
	}
	

	public List<Producto> findAll() {
		return repositorio.findAll();
	}

	
	public Iterable<Producto> BuscarProductoPorNombre(String nombre) {
		return repositorio.BuscarProductoPorNombre(nombre.toUpperCase());
	} 
	
	public Producto delete(Producto p) {
		Producto borrar = repositorio.findById(p.getId()).orElse(null);
		if (borrar != null)
			repositorio.delete(p);

		return borrar;
	}

	public Producto findById(long id) {
		return repositorio.findById(id).orElse(null);
	}


	public Producto edit(Producto p) {
		return repositorio.save(p);
	}

}
