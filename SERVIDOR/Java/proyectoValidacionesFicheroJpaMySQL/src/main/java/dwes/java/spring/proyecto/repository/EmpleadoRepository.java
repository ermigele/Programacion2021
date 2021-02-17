package dwes.java.spring.proyecto.repository;

import org.springframework.data.repository.CrudRepository;

import dwes.java.spring.proyecto.models.Empleado;



public interface EmpleadoRepository extends  CrudRepository<Empleado, Long>{

}
