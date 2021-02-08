package dwes.java.spring.proyecto.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;

import dwes.java.spring.proyecto.models.Empleado;
import dwes.java.spring.proyecto.services.EmpleadoService;

@Controller
public class EmpleadoController {

	@Autowired
	private EmpleadoService servicio;

	@GetMapping({ "/", "empleado/listado" })
	public String listado(Model modelo) {
		modelo.addAttribute("listaEmpleado", servicio.findAll());
		return "listado";
	}

	@GetMapping({ "empleado/nuevo" })
	public String nuevo(Model modelo) {
		modelo.addAttribute("empleadoForm", new Empleado());
		return "formulario";
	}

	@GetMapping({"empleado/nuevo/enviado"})
	public String enviar(@ModelAttribute("empleadoForm")Empleado nuevoEmpleado) {
		servicio.add(nuevoEmpleado);
		return "redirect:empleado/listado";
	}

	@GetMapping({"empleado/editar/{id}"})
	public String enviar(@PathVariable int id, Model modelo) {
	modelo.addAttribute("empleadoForm",  servicio.findById(id));
		return "redirect:empleado/listado";
	}
}
