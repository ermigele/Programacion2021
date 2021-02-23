package dwes.spring.tarea.miguelangel.martin.controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import dwes.spring.tarea.miguelangel.martin.servicios.ProductoServicio;


@Controller
public class ProductoController {

	@Autowired
	private ProductoServicio servicio;
	
	@GetMapping({"/", "productos"})
	public String listado(Model model){
		model.addAttribute("productos",servicio.findAll());
		return "listado";
	}
	
}
