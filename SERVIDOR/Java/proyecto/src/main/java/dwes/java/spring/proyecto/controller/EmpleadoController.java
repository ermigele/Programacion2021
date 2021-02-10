package dwes.java.spring.proyecto.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

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

	@GetMapping({ "empleado/new" })
	public String nuevo(Model modelo) {
		modelo.addAttribute("empleadoForm", new Empleado());
		return "formEmpleado";
	}

	@PostMapping({ "empleado/new/submit" })
	public String enviar(@ModelAttribute("empleadoForm") Empleado nuevoEmpleado, BindingResult bindingResult) {
		if (bindingResult.hasErrors()) {
			return "formEmpleado";
		} else {
			servicio.add(nuevoEmpleado);
			return "redirect:/empleado/listado";
		}
	}

	@PostMapping("/empleado/edit/{id}")
	public String empleadoEdit(@PathVariable Long id, Model model) {
		Empleado empleado = servicio.findById(id);
		if (empleado != null) {
			model.addAttribute("empleadoForm", empleado);
			return "formEmpleado";
		} else {
			model.addAttribute("empleadoForm", servicio.findById(id));
			return "formEmpleado";
		}
	}
}
