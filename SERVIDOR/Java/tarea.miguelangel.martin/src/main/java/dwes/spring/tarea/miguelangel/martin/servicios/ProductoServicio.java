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
	

	public Producto add(Producto p) {
		return repositorio.save(p);
	}
	

	public List<Producto> findAll() {
		// TODO Auto-generated method stub
		return repositorio.findAll();
	}


	public Producto findById(long id) {
		return repositorio.findById(id).orElse(null);
	}


	public Producto edit(Producto p) {
		// TODO Auto-generated method stub
		return p;
	}

}
