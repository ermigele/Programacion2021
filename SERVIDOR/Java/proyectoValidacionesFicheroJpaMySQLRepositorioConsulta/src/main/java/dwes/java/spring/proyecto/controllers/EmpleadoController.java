package dwes.java.spring.proyecto.controllers;

import java.util.Date;
import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.Resource;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.mvc.method.annotation.MvcUriComponentsBuilder;

import dwes.java.spring.proyecto.models.Empleado;
import dwes.java.spring.proyecto.services.EmpleadoServiceDB;
import dwes.java.spring.proyecto.upload.storage.StorageService;

@Controller
public class EmpleadoController {
	
	@Autowired
	private EmpleadoServiceDB servicio;
	
	@Autowired
	private StorageService storageService;
	
	@GetMapping({"/", "empleado/listado"})
	public String listado(Model model, @RequestParam(name="q", required=false) String query){
		List<Empleado> resultado = (query == null) ? servicio.findAll() : servicio.buscador(query);
		model.addAttribute("listaEmpleados",resultado);
		return "listado";
	}
	
	@GetMapping("/empleado/new")
	public String nuevoEmpleadoForm(Model model) {
		model.addAttribute("empleadoForm", new Empleado());
		return "formulario";
	}
	
	@PostMapping("/empleado/new/submit")
	public String nuevoEmpleadoSubmit(@Valid @ModelAttribute("empleadoForm") Empleado nuevoEmpleado,
			BindingResult bindingResult, @RequestParam("file") MultipartFile file) {

		if (bindingResult.hasErrors()) {			
			return "formulario";	
		} else {
			if (!file.isEmpty()) {
				// Lógica de almacenamiento del fichero
				Date date = new Date();
				long timeMilli = date.getTime();
				//String avatar = storageService.store(file, nuevoEmpleado.getId());
				String avatar = storageService.store(file, timeMilli);			
				nuevoEmpleado.setImagen(MvcUriComponentsBuilder.fromMethodName(EmpleadoController.class, "serveFile", avatar).build().toUriString());
			}
			servicio.add(nuevoEmpleado);
			return "redirect:/empleado/listado";
		}
	}
	
	@GetMapping("/empleado/edit/{id}")
	public String editarEmpleadoForm(@PathVariable long id, Model model) {
		Empleado empleado = servicio.findById(id);
		if (empleado!=null) {
			model.addAttribute("empleadoForm", empleado);
			return "formulario";
		}else {
			return "redirect:/empleado/new";
		}
	}
	
	@PostMapping("/empleado/edit/submit")
	public String editarEmpleadoSubmit(@Valid @ModelAttribute("empleadoForm") Empleado empleado, BindingResult bindingResult) {
		if (bindingResult.hasErrors()) {
			return "formulario";
		} else {
			servicio.edit(empleado);
			return "redirect:/empleado/listado";
		}
		
	}
	
	@GetMapping("/files/{filename:.+}")
	@ResponseBody
	public ResponseEntity<Resource> serveFile(@PathVariable String filename) {
		Resource file = storageService.loadAsResource(filename);
		return ResponseEntity.ok().body(file);
	}

}
