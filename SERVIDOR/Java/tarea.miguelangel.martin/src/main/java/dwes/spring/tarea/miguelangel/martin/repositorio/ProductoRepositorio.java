package dwes.spring.tarea.miguelangel.martin.repositorio;

import org.springframework.data.jpa.repository.JpaRepository;

import dwes.spring.tarea.miguelangel.martin.modelos.Producto;

public interface ProductoRepositorio extends JpaRepository<Producto, Long> {

}
