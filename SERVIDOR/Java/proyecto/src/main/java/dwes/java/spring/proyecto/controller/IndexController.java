package dwes.java.spring.proyecto.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import java.util.Optional;

@Controller
public class IndexController {

	@GetMapping("/prueba")
	public String holaMundo(Model model) {
	model.addAttribute("nombre","migue");
	return "index";
	}

	@GetMapping("/query")
	public String holaMundo3(@RequestParam(name="id", required=false, defaultValue="Mundo") String migue, Model model) {
	model.addAttribute("nombre",migue);
	return "index";
	}

	@GetMapping("/parametro/{param}")
	public String holaMundo5(@PathVariable String param, Model model) {
	model.addAttribute("nombre",param);
	return "index";
	}

	@GetMapping("/optional")
	public String holaMundo4(@RequestParam(name="id") Optional<String> migue, Model model) {
	model.addAttribute("nombre",migue.orElse("Mundo"));
	return "index";
	}

	@GetMapping({"/illo","/hola" }) //te la sirve poniendo cualquiera de las dos
	@ResponseBody
	public String mensaje() {
	return "illo hermano";
	}

	@RequestMapping(value="/otra", method=RequestMethod.GET)
	public String holaMundo2() {
	return "index";
	}
}