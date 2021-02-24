package dwes.spring.tarea.miguelangel.martin.repositorio;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import dwes.spring.tarea.miguelangel.martin.modelos.Producto;

public interface ProductoRepositorio extends JpaRepository<Producto, Long> {

	
	/**
	 *Lista de categorias por su nombre 
	 * @param String nombre
	 * @return Iterable Categorias
	 */
	@Query("SELECT p FROM productos p WHERE Upper(p.nombre) LIKE %?1% ")
	public Iterable<Producto> BuscarProductoPorNombre(String nombre);
}
